<?php

namespace App\Controller;

use Exception;
use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;

class LinksController extends AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public static function getRandomName(string $fileName): string
    {
        $infos = pathinfo($fileName);

        try {
            $bytes = random_bytes(15);
        } catch (Exception $e) {
            $bytes = openssl_random_pseudo_bytes(15);
        }

        return bin2hex($bytes) . '.' . $infos['extension'];
    }

    /**
     * @throws SQL
     */
    public static function addLinks ()
    {
        if (isset($_POST['submit'])) {
            if (self::formIsset('linkTitle', 'link')) {
                if (isset($_FILES['linkImg'])) {

                    $links = R::dispense('links');
                    $user = R::findOne('user', 'id=?', [$_SESSION['user']->id]);
                    $linkTitle = filter_var($_POST['linkTitle'], FILTER_SANITIZE_STRING);
                    $link = filter_var($_POST['link'], FILTER_SANITIZE_STRING);

                    if ($_FILES['linkImg']["name"] === "") {

                        $links->link = $link;
                        $links->link_title = $linkTitle;
                        $links->link_image_name = "defaultImage";
                        $links->link_image_extension = "jpg";

                        $user->ownLinksList[] = $links;

                        R::store($user);

                        $_SESSION['success'] = "Ajout validé.";
                        header("Location: /?c=home");
                        exit();

                    }
                    else {
                        $tmp_name = $_FILES['linkImg']['tmp_name'];
                        $img_name = self::getRandomName($_FILES['linkImg']['name']);
                        if (!is_dir('img/')) {
                            mkdir('img/', '0755');
                        }

                        if (self::checkMimeType($tmp_name)) {
                            move_uploaded_file($tmp_name, 'img/' . $img_name);
                            $sanitize_img_name = preg_replace('/\\.[^.\\s]{2,4}$/', '', $img_name);

                            $infos = pathinfo($_FILES['linkImg']['name']);

                            $links->link = $link;
                            $links->link_title = $linkTitle;
                            $links->link_image_name = $sanitize_img_name;
                            $links->link_image_extension = $infos['extension'];

                            $user->ownLinksList[] = $links;

                            R::store($user);

                            $_SESSION['success'] = "Ajout validé.";
                            header("Location: /?c=home");
                        }
                        else {
                            $_SESSION['error'] = "Le type de fichier n'est pas valide.";
                            header("Location: /?c=home");
                            exit();
                        }
                    }
                }
            }
            else {
                $_SESSION['error'] = "Un ou plusieurs champs sont manquants.";
                header("Location: /?c=home");
                exit();
            }
        }
    }
}