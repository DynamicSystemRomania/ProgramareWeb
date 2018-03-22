<?php
require_once 'idiorm.php';
ORM::configure('sqlite:/var/local/pweb-lab4/db.sqlite');

ORM::get_db()->exec('DROP TABLE IF EXISTS person;');
ORM::get_db()->exec('DROP TABLE IF EXISTS message;');
ORM::get_db()->exec('DROP TABLE IF EXISTS friends;');


ORM::get_db()->exec(
    'CREATE TABLE person (' .
    'id INTEGER PRIMARY KEY AUTOINCREMENT, ' .
    'name TEXT, ' .
    'age INTEGER)'
);

ORM::get_db()->exec(
    'CREATE TABLE friends (' .
    'id1 INTEGER , ' .
    'id2 INTEGER  )'
);

ORM::get_db()->exec(
    'CREATE TABLE message ( idp INTEGER, m VARCHAR (100), FOREIGN KEY (idp) REFERENCES person(id)  )'
);

function create_person($name, $age) {
    $person = ORM::for_table('person')->create();
    $person->name = $name;
    $person->age = $age;
    $person->save();
    return $person;
}

function create_message($id , $mes ) {

    $row = ORM::for_table('message')->create();
    $row->idp = $id;
    $row->m = $mes;
    $row->save();
    return $row;

}


function create_friend( $id1, $id2) {

    $row = ORM::for_table('friends')->create();
    $row->id1 = $id1;
    $row->id2 = $id2;
    $row->save();
    return $row;

}

$person_list = array(
    create_person('Corina', 41),
    create_person('Delia', 43),
    create_person('Tudor', 56),
    create_person('Adina', 32),
    create_person('Ada', 50),
    create_person('Camelia', 40),
    create_person('Vlad', 72),
    create_person('Emil', 27),
    create_person('Ștefan', 46),
    create_person('Dan', 63),
    create_person('Roxana', 67),
    create_person('Octavian', 34),
    create_person('Radu', 78),
    create_person('Marina', 63),
    create_person('Cezar', 19),
    create_person('Laura', 36),
    create_person('Andreea', 61),
    create_person('George', 28),
    create_person('Liviu', 44),
    create_person('Eliza', 19),
);





echo('ok<br>');
echo('person ' . ORM::for_table('person')->count() . '<br>');

echo "\n";
echo "\n";
/* Ex1 */
$a = ORM::for_table('person')->findOne(5)->asArray();
print $a["name"]."  ".$a["age"];

/* Ex2 */
echo "\n";
$a = ORM::for_table('person')->findArray();
print_r($a);

/* Ex3 */
echo "\n";
$a =ORM::for_table('person')->rawQuery("select * from person where name like '%lia'")->findArray();
print_r($a);
$b =ORM::for_table('person')->rawQuery("select * from person where name like '%an'")->findArray();
print_r($b);

/* Ex4 */
$person_massage_list = array(

    create_message(1,'a'),
    create_message(2,"b"),
    create_message(3,"c"),
    create_message(4,"d"),
    create_message(5,"e"),
    create_message(6,"f"),
    create_message(7,"g"),
    create_message(8,"h"),
    create_message(9,"i"),
    create_message(10,"j"),
    create_message(11,"k"),
    create_message(12,"l"),
    create_message(13,"m"),
    create_message(14,"n"),
    create_message(15,"o"),
    create_message(16,"p"),
    create_message(17,"q"),
    create_message(18,"r"),
    create_message(19,"s"),
    create_message(20,"t"),
    create_message(20,"u"),
    create_message(19,"v"),
    create_message(18,"w"),
    create_message(17,"x"),
    create_message(16,"y"),
    create_message(15,"z"),
    create_message(14,";")
);

/* Ex5 */
echo "\n";
$a =ORM::for_table('person')->rawQuery("select name, age , COUNT (idp) from person INNER JOIN message where id = idp GROUP BY id")->findArray();
print_r($a);

/* Ex6 */
echo "\n";
$a =ORM::for_table('person')->rawQuery("select name, age , idp, m from person INNER JOIN message where id = idp ")->findArray();
print_r($a);

/* Ex7 */
echo "\n";
$a =ORM::for_table('person')->rawQuery("select name, age , idp, m from person INNER JOIN message where id = idp  and age <=40")->findArray();
print_r($a);

/* Ex8 */
create_friend(1,2);
create_friend(1,3);
create_friend(1,4);
create_friend(1,5);
create_friend(2,3);
create_friend(1,4);
create_friend(2,1);
create_friend(3,1);
create_friend(20,1);
create_friend(20,2);

/* Ex9 */
echo "\n";
$a =ORM::for_table('person')->rawQuery("select id , name, age ,  (select count(*) from friends where id1 = id)  from person ")->findArray();
print_r($a);

/* Ex10 */
echo "\n";
$a = ORM::for_table('person')->table_alias('p1')->select('p1.*')->join('friends', array('p1.id', '=', 'p2.id1'), 'p2')->findArray();
print_r($a);

echo "\n";
echo "\n";