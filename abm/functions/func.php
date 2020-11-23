<?php

function redimensionar($ruta, $file_name, $uploadedfile, $id, $sizes)
{
  $filename = stripslashes($file_name);
  $extension = getExtension($filename);
  $extension = strtolower($extension);
  if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
    $errors = 1;
  } else {
    $size = filesize($uploadedfile);

    if ($size > 2 * 1024) {
      $errors = 2;
    }

    if ($extension == "jpg" || $extension == "jpeg") {
      $src = imagecreatefromjpeg($uploadedfile);
    } else if ($extension == "png") {
      $src = imagecreatefrompng($uploadedfile);
      imagealphablending($src, true);
      imagesavealpha($src, true);
    } else {
      $src = imagecreatefromgif($uploadedfile);
    }

    list($width, $height) = getimagesize($uploadedfile);
    foreach ($sizes as $tam) {
      $newwidth = $tam['ancho'];
      $newheight = ($height / $width) * $newwidth;

      if ($newheight > $tam['alto']) {
        $newheight = $tam['alto'];
        $newwidth = ($width / $height) * $newheight;
        if ($newwidth > $tam['ancho']) {
          $height = $newheight;
          $width = $newwidth;
          $newheight = ($height / $width) * $newwidth;
        }
      }
      $tmp = imagecreatetruecolor($newwidth, $newheight);
      if ($extension == "png") {
        $rojo = imagecolorallocate($tmp, 234, 234, 234);
        imagefill($tmp, 0, 0, $rojo);
      }
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

      // img_0_small.png
      $filename = $ruta . 'img_' . $id . '_' . $tam['nombre'] . '.' . $extension;
      if ($extension == "png") {
        $rojo = imagecolorallocate($tmp, 234, 234, 234);
        imagecolortransparent($tmp, $rojo);
        imagepng($tmp, $filename, 9);
      } elseif ($extension == 'gif') {
        imagegif($tmp, $filename, 100);
      } else {
        imagejpeg($tmp, $filename, 100);
      }
      imagedestroy($tmp);
    }
    imagedestroy($src);
  }
}

//funcion para obtener la extension
function getExtension($str)
{
  $i = strrpos($str, ".");
  if (!$i) {
    return "";
  }
  $l = strlen($str) - $i;
  $ext = substr($str, $i + 1, $l);
  return $ext;
}

//Funcion para borrar imagenes
function eliminar_archivos($carpeta, $id)
{
  $dir = $carpeta . '/' . $id . '/';
  if (is_dir($dir)) {
    $directorio = opendir($dir);
    while ($archivo = readdir($directorio)) {
      if ($archivo != '.' and $archivo != '..') {
        @unlink($dir . $archivo);
      }
    }
    closedir($directorio);
    @rmdir($dir);
  }
}

//funcion para cortar un texto pero no las palabras.

// function cortar_palabras($texto, $limite, $break = ' ', $pad = '...')
// {
//   if (strlen($texto) <= $limite)
//     return $texto;
//   $quiebre = strpos($texto, $break, $limite);
//   if ($quiebre != false) {
//     if ($quiebre < (strlen($texto) - 1)) {
//       $texto = substr($texto, 0, $quiebre) . $pad;
//     }
//   }
//   return $texto;
// }


// function obtener_archivos($ruta)
// {
//   $file[0] = 'none';
//   if (is_dir($ruta)) {
//     $directorio = opendir($ruta);
//     $i = 0;
//     while ($archivo = readdir($directorio)) {
//       if ($archivo != '.' and $archivo != '..') {
//         $file[$i] =  $ruta . $archivo;
//         $i++;
//       }
//     }
//     closedir($directorio);
//   }
//   return $file;
// }

function obtener_imagenes_small($ruta)
{
  $galeria = '';
  if (is_dir($ruta)) {
    $directorio = opendir($ruta);
    while ($archivo = readdir($directorio)) {
      if ($archivo != '.' and $archivo != '..' and stristr($archivo, 'small') !== false) {
        $galeria .= '<img src="' . $ruta . '/img_0_small.jpg' . '" alt="' . $archivo . '" class="rounded" >';
      }
    }
    closedir($directorio);
  }
  return $galeria;
}

function obtener_imagenes_thumb($ruta)
{
  $galeria = '';
  if (is_dir($ruta)) {
    $directorio = opendir($ruta);
    while ($archivo = readdir($directorio)) {
      if ($archivo != '.' and $archivo != '..' and stristr($archivo, 'small') !== false) {
        $galeria .= '<img src="' . $ruta . '/img_0_thumb.jpg' . '" alt="' . $archivo . '" class="rounded">';
      }
    }
    closedir($directorio);
  }
  return $galeria;
}


// function cant_imagenes($carpeta, $id, $base = '../')
// {
//   $ruta = $base . 'file_sitio/' . $carpeta . '/' . $id . '/';
//   $i = 0;
//   if (is_dir($ruta)) {
//     $dh = opendir($ruta);
//     while (($file = readdir($dh)) !== false) {
//       if ($file != "." && $file != "..") {
//         if (stristr($file, 'mini') !== false)
//           $i++;
//       }
//     }
//   }
//   return $i;
// }
