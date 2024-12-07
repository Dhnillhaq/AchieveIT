<?php
class Flasher
{
    public static function setFlash($action, $message, $type, $url = '')
    {

        $_SESSION['flash'] = [
            'action' => $action,
            'message' => $message,
            'type' => $type,
            'url' => $url
        ];

    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo "Swal.fire({
        title: '".$_SESSION['flash']['action']."',
        text: '".$_SESSION['flash']['message'].".',
        icon: '".$_SESSION['flash']['type']."',
        allowOutsideClick: false
         }).then((result) => {
         if (result.isConfirmed) {
         if ('" . $_SESSION['flash']['url'] . "' !== '') {
                    window.location.href = '" . BASEURL . "/" . $_SESSION['flash']['url'] . "';
                }
         }
        });";
            unset($_SESSION['flash']);
        }
    }
}
?>