<?php

class Flasher
{
    public static function setFlash($action, $message, $type, $url = '')
    {
        Session::set('flash', [
            'action' => $action,
            'message' => $message,
            'type' => $type,
            'url' => $url
        ]);
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            if ($_SESSION['flash']['type'] == "question" || $_SESSION['flash']['type'] == "warning") {
                echo "Swal.fire({
                     title: '" . $_SESSION['flash']['action'] . "',
                  text: '" . $_SESSION['flash']['message'] . "',
                  icon: '" . $_SESSION['flash']['type'] . "',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, " . $_SESSION['flash']['action'] . "!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    if ('" . $_SESSION['flash']['url'] . "' !== '') {
                    window.location.href = '" . BASEURL . "/" . $_SESSION['flash']['url'] . "';
                    }
                  }
                });";
            } else {
                echo "Swal.fire({
                    title: '" . $_SESSION['flash']['action'] . "',
                    text: '" . $_SESSION['flash']['message'] . "',
                    icon: '" . $_SESSION['flash']['type'] . "',
                    allowOutsideClick: false
                    }).then((result) => {
                         if (result.isConfirmed) {
                            if ('" . $_SESSION['flash']['url'] . "' !== '') {
                                 window.location.href = '" . BASEURL . "/" . $_SESSION['flash']['url'] . "';
                             }
                         }
                    });";
            }
            Session::remove('flash');
        }
    }
}
?>