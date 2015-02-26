<?php 
    session_start();
    require_once 'sqlConnection.php'; //Requiere el archivo 'SqlConnection.php 
    include('sqlData.php');
    class login //Crea la clase 'login' 
    { 
        public function __construct($usr,$inUsr,$inPss) //Crea la función '__construct' con el las tres variables. 
        { 
            $this->Username=$usr; 
            $this->PostUser=$inUsr; 
            $this->PostPass=$inPss; 
        }
        public function checkSession() //Crea la función 'checkSession()' 
        { 
            if(isset($this->Username)) //Si existe la variable 'Username': 
            { 
                //header($admin); //Redirige una carpeta atrás. O sea al index.php 
            }
        } 
        public function checkForm() //Crea la función 'checkForm()' 
        { 
            if(!isset($this->PostUser)) //Si NO existe la variable 'PostUser': 
            { 
                header($admin);
            } 
            if(!isset($this->PostPass)) 
            { 
                //header($admin);
            }    
        } 
    }

    //Se crea una nueva clase 'login' con los valores 'Username'=$_SESSION['user'] ; 'PostUser'=$_SESSION['inUser'] ; 'PostPass'=$_SESSION['inPass']  
    $check= new login($_SESSION['user'],$_POST['inUser'],$_POST['inPass']);
    $check-> checkSession(); //Se ejecuta la función 'checkSession()' 
    $check-> checkForm(); //Se ejecuta la función 'checkForm() 
     
    $sqlSyntax= 'SELECT user_username,user_password FROM users WHERE user_username = "'.$_POST['inUser'].'" AND user_password = "'.$_POST['inPass'].'"'; //Se crea la sintaxis para la base de datos 
    $sqlQuery= mysql_query($sqlSyntax); //Se ejecuta el query de $sqlSyntax 
    $sqlSyntax2= 'SELECT * FROM users WHERE user_username = "'.$_POST['inUser'].'"';  //Se crea la siguiente sintaxis 
    $sqlQuery2= mysql_query($sqlSyntax2); //Se ejecuta el segundo query 
    $sqlRow= mysql_num_rows($sqlQuery); //Se verifica el total de filas devueltas de $sqlQuery 
    if($sqlRow==1) //Si el valor devuelto por $sqlRow es igual a 1: 
    { 
        while($resQry2= mysql_fetch_array($sqlQuery2)) //Mientras se lee el array y lo guarda en $resQry2 ejecutando el segundo query: 
        { 
            $_SESSION['user']= $resQry2[0]; //Le asigna el valor contenido en la posición 0 del arrray a la variable de sesión 'user' 
            $_SESSION['usuario'] = $resQry2[user_username];
            $_SESSION['colegio'] = $resQry2[Colegio];
            $_SESSION['id_user'] = $resQry2[user_id];
        } 
        $_SESSION['error']= 'Bienvenid@ '.$_SESSION['colegio'].''; //Le asigna a la variable de sesión un mensaje de bienvenida con el nombre del usuario 
        $_SESSION['time']= time(); //Asigna el valor time() a la variable de sesión 'time' 

        /*
        while ($row = mysql_fetch_array($sqlQuery))
        {
            $_SESSION['user']['nivel'] = $row[0];
        }
*/
        header('Location:'.$_COOKIE['referer']);
         
    } 
    else //Si el valor de filas devuelto es distinto de 1: 
    { 
        $_SESSION['error']= 'Usuario o contraseña incorrectos'; //Se le asigna un mensaje de error a la variable de sesión 'error' 
        header('Location: ../../usererror.php');
    } 

?> 