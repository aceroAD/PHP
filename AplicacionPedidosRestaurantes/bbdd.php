<?php
    function readConfiguration($file, $schema) {
        $config = new DOMDocument();
        $config->load($file);
        $validacion = $config->schemaValidate($schema);
        if($validacion == FALSE)
            throw new InvalidArgumentException("Revise fichero de configuración");
        
        $xpath = new DOMXPath($config);
        $ip = $xpath->evaluate('/configuracion/ip/');
        $nombre = $xpath->evaluate('/configuracion/nombre/');
        $user = $xpath->evaluate('/configuracion/usuario/');
        $clave = $xpath->evaluate('/configuracion/clave');
        
        $cadena_conexion = "mysql:dbname=" . $nombre[0]->nodeValue . ";host=" . $ip[0]->nodeValue;
        
        $resultado = [];
        $resultado = $cadena_conexion;
        $resultado = $user[0]->nodeValue;
        $resultado = $clave[0]->nodeValue;
        
        return $resultado;
    }