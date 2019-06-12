<?php
namespace backend\helpers;

use Yii;
use linslin\yii2\curl;
use backend\traits\Respuestas;

class ConexionApi
{

  use Respuestas;
  public static function apiPost(array $data,string $url){
    $curl = new curl\Curl();
    $baseUrl = getenv('SERVER_MD');
    $_this = new self;
    $response = $curl->setPostParams($data)
                ->setHeaders([
                  'Content-Type' => 'application/x-www-form-urlencoded',
                ])
                ->setOption(
                  CURLOPT_TIMEOUT, 10,
                CURLOPT_POSTFIELDS)
    ->post($baseUrl.$url."?access-token=".Yii::$app->session->get('token'));
    return $_this->manejoErrores($curl,$response);
  }

  public static function apiGet(array $data,string $url){
    $curl = new curl\Curl();
    $baseUrl = getenv('SERVER_MD');
    $_this = new self;
    $response = $curl->setGetParams($data)
                ->setHeaders([
                  'Content-Type' => 'application/x-www-form-urlencoded',
                ])
                ->setOption(
                  CURLOPT_TIMEOUT, 10,
                CURLOPT_POSTFIELDS)
    ->get($baseUrl.$url);
    return $_this->manejoErrores($curl,$response);
  }

  private function manejoErrores($curl,$respose){
    switch ($curl->responseCode) {
      case 'timeout':
          return $this->error(201);
          break;
      case 200:
          return $this->correctoDatos($respose);
          break;
      default:
        return $this->error();
        break;
    }
  }
}

