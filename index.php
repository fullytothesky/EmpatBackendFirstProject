<!--для того щоб почати писати весь php код, відкриваємо < ? php // і закриваємо ?>
 якщо в самому файлі нічого не буде окрім php коду , то в такому випадку, можемо не прописувати закриваючий тег -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

echo "Hello, Yaroslav!<br>";

//-------------------------------------------1 змінні-------------------------------------------------------------

$name='Vlad';
$age=19;
$year=2004;
echo $age+$year;
echo '<br>';


//-------------------------------------------2 конкатенація досягається через .-----------------------------------

echo $name.' is '.$age.' years old <br>';

//-------------------------------------------3 масиви та асоціативні масиви---------------------------------------

$empats = array('Andrii','Yaroslav', 'Valya');
// альтернативний спосіб створення масиву $empats= ['Andrii','Yaroslav', 'Valya'];
$asocArray = ["name" =>"Vlad", "The best back-ender"=>"Yaroslav",  ];
echo $asocArray["The best back-ender"].'<br>';


//--------------------------------------------4 explode implode

// explode використовується для того, щоб розбивати рядок в масив по параметру (деліметру)

$empatString='Andrii,Yaroslav,Valya';

$empatArray=explode(',',$empatString);
print_r($empatArray);   //print_r виводимите зрозумілу інформацію про певну змінну, в нашому випадку створений array
echo '<br>';
// implode об'єднує елементи в рядок по певному розділювачу
$empatString=implode("|",$empatArray);
echo $empatString.'<br>';



//---------------------------------------------5 розіменування змінних
//variable dereferencing
$value = 'Empat is cool';

$statement ='value';


echo $statement;  //value
echo '<br>';
echo $$statement; //Empat is cool
echo '<br>';
//-----------------------------------------------6 порівняння
$var1=4;
$var2='4';
if($var1==$var2){
    echo "It really should work";
    echo '<br>';
}
if($var1===$var2){
    //це вже автоматично вибиває помилку, тому що типі вже не однакові
}
if($var1!==$var2){
    echo "It also should work";
    echo '<br>';
}

echo ($checker= 6<>5);         //альтернатива використання оператору != , також можемо використати >,<,<==>(spaceship)
echo '<br>';
//-----------------------------------------------7 приведення типів
//casting types
$year= 20 + "04"; //інтерпретатор автоматично(неявно) приводить нашу 04 в інт , оскільки очікує числові операнди
echo gettype($year);
echo '<br>';

$num =(int)NULL; //явно перетворюємо bool в integer
echo gettype($num);
echo '<br>';






//------------------------------------------------------------ ООП --------------------------------------------------------


class EmpatPypsiki{
    //створюємо статичну змінну та метод. Для того , щоб отримати до них доступ, не обов'язково створювати об'єкт класу.
    // Ми також можемо додавати цю змінну до конструктора , і в залежності від кількості створених об'єктів, значення змінної буде збільшуватися-->
    public static int $value=0;


    public string $pypsik1;
    protected string $pypsik2; //доступна в цьому класі і тільки для нащадків
    private string $pypsik3; //доступна тільки для цього класу і може викликатися тільки з методу
    function __construct(

            string $pyps1="I am pyps number one",
            string $pyps2= " I am pyps number two",
            string $pyps3="I am pyps number three"){

         $this->pypsik1=$pyps1;
         $this->pypsik2=$pyps2;
         $this->pypsik3=$pyps3;
         EmpatPypsiki::$value++;
    }
    function getPypsikiv(): void
    {
        echo $this->pypsik1;
        echo'<br>';
        echo $this->pypsik2;
        echo'<br>';
        echo $this->pypsik3;
        echo'<br>';
    }

    public static function getStaticValue() :void
    {
        echo EmpatPypsiki::$value;
        echo '<br>';
    }
}

class EmpatStudentPypsik extends EmpatPypsiki {

    //клас не буде неявно викликати конструктори, які були визначені в класах батьках , якщо дочірній клас має свій визначений конструктор
     function setStudentaPypsika(int $num, string $valuePypsik):void
     {
        if($num==1){
             $this->pypsik1=$valuePypsik;
        }
        else{
            $this->pypsik2=$valuePypsik;
        }
        //pypsik3 не буде змінюватися оскільки він приватний
     }

     //магічні методи у php розпочинаються з двох нижніх підкреслень
    // в даному випадку __get буде використовуватися коли ми будемо намгатися отримати доступ до закритої змінної
     public function __get($param)
     {
         if(property_exists($this,$param)){
             return $this-> $param;
         }
     }
}


$obj1= new EmpatPypsiki(pyps3:"pypsik Vlad");
$obj1 -> getPypsikiv();
$obj3= new EmpatStudentPypsik();//викликається батьківський конструктор
$obj3->pypsik2;
EmpatPypsiki::getStaticValue();


//інтерфейси дозволяють реалізовувати схему так званого 'поліморфізму' коли декілька класів імплементують один і той же інтерфейс.
//інтерфейс мусить мати загальний опис методів без боді та методи обов'язково мають бути публічними
interface PupsikMentor{
    public function creates();
}

class Designer implements PupsikMentor {
    public function creates():void{
        echo "I create super designs for Empat";
    }
}

class Programmer implements PupsikMentor{

    public function creates():void
    {
        echo "I create applications for Empat using beautiful designs";
    }
}







//Singleton - паттерн проектування

//цей паттерн гарантує , що в программі буде доступний єдиний екземпляр певного класу, який буде доступний з будь-якого місця в програмі

class Singleton {
    private $props=[]; #створюємо глобальний асоціативний масив
    private static $classInstance; # статична змінна , яка буде зберігате лише один об'єкт даного класу

    private function __construct() {}#робимо конструктор приватним, щоб заборонити створення нового екземпляру класу
    # private function __clone(){}  #також робимо магічний метод __clone приватним, щоб заборонити клонування, оскільки об'єкт має бути один
    # private function __wakeup(){}
    static function getInstance(){
        if(empty(self::$classInstance)){
            self::$classInstance=new static;
        }

        return self::$classInstance;
    }

    public function setProperty(string $ourKey,string $ourValue)
    {
        $this->props[$ourKey]=$ourValue;
    }

    public function getProperty(string $ourKey){

        return $this->props[$ourKey];
    }
}

$obj1=Singleton::getInstance();
$obj1->setProperty('createdKey1', 'createdValueForKey1');
unset($obj1);

$obj2=Singleton::getInstance();
echo '(Singleton) ';
echo $obj2->getProperty('createdKey1');
echo '<br>';



trait Trait1{

    public function getTrait1():string{
        return "This is the message from the trait1";
    }

}

trait Trait2{

    public function getTrait2():string{
        return "This is the message from the trait2";
    }
}


class BaseClass {
    use Trait1,Trait2;

}

class InheritedClass extends BaseClass{}


$objTrait=new InheritedClass();
echo "(Traits) ".$objTrait->getTrait1();
echo '<br>';
echo "(Traits) ".$objTrait->getTrait2();
?>
</body>
</html>
