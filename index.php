<?php 
    $sektion_array = [
        "Информационные технологии в образовании",
        "Менеджмент качества образования",
        "Сертификация образовательных учреждений",
        "Психологические особенности группового обучения"
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .grid {
            display: block;
            grid-template-columns: repeat(2, 50%);
            align-items: center;
            justify-items: center;
        }
        form {
            width: 700px;
        }
        #reset {
            display: grid;
            align-items: center;
            justify-items: center;
        }
        #grid-rows {
            display: grid;
            grid-template-rows: repeat(4, auto);
            grid-template-columns: 20px 300px;
            align-items: center;
            justify-items: start;
        }
    </style>
</head>
<body>
    
    <form action="index.php" method="POST" enctype="multipart/form-data" method="POST">
        <div class="grid">
            <p>Введите фамилию участника</p>
            <input type="text" name="fio">
        </div>
        <div class="grid">
            <p>Название секции</p>
            <select name="section">
                <?php 
                    for ($i=0; $i < count($sektion_array); $i++) { 
                        if ($i == 0) {
                            echo '<option selected value="'.'sektion'.$i.'">'.$sektion_array[$i].'</option>';
                        }
                        else {
                            echo '<option value="'.'sektion'.$i.'">'.$sektion_array[$i].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="grid">
            <p>Пол</p>
            <div>
                <input type="radio" name="sex" checked value="man"><label for="man">Мужской</label>
                <input type="radio" name="sex" value="woman"><label for="woman">Женский</label>
            </div>
        </div>
        <div class="grid">
            <p>Задайте дополнительные потребности</p>
            <div id="grid-rows">
                <input type="checkbox" name="dop_potrebnosti[]" value="мультимедиапроектор"><label for="мультимедиапроектор">мультимедиапроектор</label>
                <input type="checkbox" name="dop_potrebnosti[]" value="видеоплеер"><label for="видеоплеер">видеоплеер</label>
                <input type="checkbox" name="dop_potrebnosti[]" value="участие в экскурсиях по городу"><label for="участие в экскурсиях по городу">участие в экскурсиях по городу</label>
                <input type="checkbox" name="dop_potrebnosti[]" value="qwe"><label for="обеспечение обратными билетами">обеспечение обратными билетами</label>

            </div>
        </div>
        <div class="grid">
            <input type="submit" name="dokladchik" value="Докладчик">
            <input type="submit" name="uchastnick" value="Участник">
        </div>
        <div id="reset">
            <input type="reset" value="Сброс">
        </div>
    </form>
    <p>
        <?php 
         $message = "";
            if (isset($_POST['dokladchik'])) { 
                $text = "докладчика";
                $sex = "";
                $add = "";
                if ($_POST['sex'] == 'man') {
                    $sex = "Уважаемый господин ";
                }
                if ($_POST['sex'] == 'woman') {
                    $sex = "Уважаемая госпожа ";
                }
                $section = $sektion_array[$_POST['section'][7]];
               
                    $zxc = "";
                    $countt = 0;
                if(isset($_POST['dop_potrebnosti'])) {
                    $selected_values = $_POST['dop_potrebnosti'];
                    
                    if ( count($selected_values)>1 || $selected_values!="qwe" && count($selected_values)==1 ){
                            $zxc.=". Дополнительно Вы заказали ";
                        }
                    foreach ($selected_values as $val) {
                        
                        if ($val=="qwe"){
                            $zxc.=". Для Вас будет заказан обратный билет. ";
                        }
                        else{
                          
                            $zxc.=", ";
                            $zxc.=$val;
                            
                        }
                        $countt ++;
                    }
                }
                
                echo $message;
                
                
                echo $sex.$_POST['fio']." !<br>
                Предлагаем Вам принять участие в нашей конференции в качестве ".$text." на секции <".$section. "> ". "  ". $zxc." ";
               
                } 

            if (isset($_POST['uchastnick'])) { 
                $text = "участника";
                $sex = "";
                if ($_POST['sex'] == 'man') {
                    $sex = "Господин";
                }
                if ($_POST['sex'] == 'woman') {
                    $sex = "Госпожа";
                }
                $section = $sektion_array[$_POST['section'][7]];
                $zxc = "";
                    $countt = 0;
                if(isset($_POST['dop_potrebnosti'])) {
                    $selected_values = $_POST['dop_potrebnosti'];
                    
                    if ( count($selected_values)>1 || $selected_values!="qwe" && count($selected_values)==1 ){
                            $zxc.=". Дополнительно Вы заказали ";
                        }
                    foreach ($selected_values as $val) {
                        
                        if ($val=="qwe"){
                            $zxc.=". Для Вас будет заказан обратный билет. ";
                        }
                        else{
                          
                            $zxc.=", ";
                            $zxc.=$val;
                            
                        }
                        $countt ++;
                    }
                }
                echo $sex.$_POST['fio']." !<br>
                Предлагаем Вам принять участие в нашей конференции в качестве ".$text." на секции <".$section. "> ". "  ". $zxc." ";
            } 
        ?>
    </p>
</body>
</html>