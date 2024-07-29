<?php 
function getUF()
    {            
            $UFData = Http::get('http://api.cmfchile.cl/api-sbifv3/recursos_api/uf?apikey=d95fa4d6e65324b446b210582861bc46ef2767a5&formato=json');
            //return view('verUF',compact('UFData'));
            echo $UFData; 
            
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFs, yeah !</title>
</head>
<body>
    <h4>
    <?php getUF()?>
    </h4>
</body>
</html>
