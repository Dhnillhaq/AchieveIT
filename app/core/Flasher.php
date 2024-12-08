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
            if ($_SESSION['flash']['action'] == "Delete") {
                echo "Swal.fire({
                     title: 'Apakah kamu yakin?',
                  text: 'Data tidak bisa dikembalikan lagi!',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire({
                      title: 'Dihapus!',
                      text: 'Data berhasil dihapus.',
                      icon: 'success'
                    });
                  }
                });";
            } else {
                echo "Swal.fire({
                    title: '" . $_SESSION['flash']['action'] . "',
                    text: '" . $_SESSION['flash']['message'] . ".',
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
            unset($_SESSION['flash']);
        }
    }
}
?>