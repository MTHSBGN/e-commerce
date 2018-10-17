
<?php
$hashed_password = crypt('test','$6$rounds=5000$usesomesillystringforsalt$'); // let the salt be automatically generated
$user_input = 'test';

echo $hashed_password . '<br>';
echo crypt($user_input, $hashed_password) . '<br>';
/* You should pass the entire results of crypt() as the salt for comparing a
   password, to avoid problems when different hashing algorithms are used. (As
   it says above, standard DES-based password hashing uses a 2-character salt,
   but MD5-based hashing uses 12.) */
if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
   echo "Password verified!";
}
?>
