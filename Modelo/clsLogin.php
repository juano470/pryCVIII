<?php

/**
 * Description of Login
 *
 * @author LEO
 */
class Login {

    function login($pDatos) {
        extract($pDatos);
        $shPass = sha1($pass);
        $sql = "SELECT * FROM tblusuario WHERE nombre_usuario='$user' and password='$shPass';";
        foreach (clsConexion::$pdo->query($sql) as $row) {
            //file_put_contents('pruebsql.txt', $row['tipo_usuario']);
            if (($row['id_tipo'] == '1')) {
                session_start();
                $_SESSION['estado'] = true;
                $_SESSION['id_tipo'] = $row['id_tipo'];
                $_SESSION['usr'] = $row['nombre_usuario'];
                echo json_encode("admin");
            } else if ($row['tipo_usuario'] == '2') {
                session_start();
                $_SESSION['estado'] = true;
                $_SESSION['id_tipo'] = $row['id_tipo'];
                $_SESSION['usr'] = $row['nombre_usuario'];
                echo json_encode("estudiante");
            }
                echo json_encode("error");
            }
        }
    }

    /* Este metodo cierra la session del usuario, esto se hace para que la
     * session no quede activa y asi poder iniciar por url.
     */

    function cerrar($pDatos) {
        extract($pDatos);
        session_start();
        $_SESSION['estado'] = false;
        echo json_encode("exit");
    }

}

?>