<?php
function other_details()
{
	echo 'embeded php successfully';
}

echo 'hello world'.'<br>';
print("lets get connected to the database.".'<br>');
print '<br>the database details are as follows :'.'<br>';

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'test';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;
$conn = new PDO($dsn, $user, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//$query = 'SELECT  * FROM personaldetails where id=:id';
//this is a named param for prepared stmt. we also have positional query we use ? there.
$id = 2;
$stmt = $conn->prepare('SELECT *FROM personaldetails where id=:id');
$stmt->execute(['id'=>$id]);  // for named param we have to use => to pass the value
$results = $stmt->fetchAll();//consider this a resultset.

//var_dump($results);#this is used to dump all contents in $results.
#pdo queries

foreach ($results as $result)
{
	echo '<h1>'.$result->user.'</h1>'.'<br>';
	echo $result->qualifications.'<br>';
	echo $result->address.'<br>';
}


// while ($row = $stmt->fetch())//i can directly get result or have a seperate resultset as above.
// {
// 	echo $row->user;
// }



















/*
$conn = new PDO($dsn, $user, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
#pdo queries
$stmt = $conn->query('select * from personaldetails');

different fetch options available are:
PDO::Fetch_obj  access to elments: $row = stmt->'columnName';
, PDO::Fetch_assoc, PDO::

while ($row = $stmt->fetch())
{
	//echo $row['user'].'______'.$row['email'].'______'.$row['contact'].'<br>';
	echo $row->user.'<br>';//remember dont put the column name in the quotes.
}
*/
?>
