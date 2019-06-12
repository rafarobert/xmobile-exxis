<?php
namespace backend\traits;


trait Respuestas
{
    /**
     * Códigos de errores:
     * Código: 200 => error generico no se envio el error o se desconoce el error
     * Código: 100 => código satisfactorio, no se envio el codigo o simplemente se realizo la tarea
     * Código: 60 => no se encontro resultados
     * Código: 300 => error generico al actualizar datos
     * Código 201 => usuario/contraseña incorrectos
     */

    private function correcto(string $mensaje = 'OK',int $codigo = 100){
        $respuesta = array(
            "estado" => "correcto",
            "code" => $codigo,
            "mensaje" => $mensaje
        );
        return $respuesta;
    }

    private function correctoDatos(string $datos = null,int $codigo = 100){
      $respuesta = array(
          "estado" => "correcto",
          "code" => $codigo,
          "datos" => json_decode($datos)
      );
      return $respuesta;
    }

    private function error(int $codigo = 200){
        $respuesta = array(
          "estado" => "error",
          "code" => $codigo
      );
      return $respuesta;
    }

    private function errorMensaje(string $mensaje = 'ERROR',int $codigo = 200){
        $respuesta = array(
          "estado" => "error",
          "code" => $codigo,
          "mensaje" => $mensaje
      );
      return $respuesta;
    }
}