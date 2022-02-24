<?PHP
  include_once('./header.php');  


  /////////////////////////////////////////////////////////////////////////////////

  $name = $_POST['name'];
  $mail = $_POST['mail'];

  $sql = "insert into member_list (name, mail)  values ('$name', '$mail')";
  mysqli_multi_query($conn, $sql);

  $sql = "select  *  from  member_list";
  $result = mysqli_query($conn, $sql);

  $arr = array();  //배열선언
  if( mysqli_num_rows($result) > 0 ){  //데이터가 들어있다면
      while( $row = mysqli_fetch_array($result) ){
          array_push( $arr,  array(
              "이름"   => $row['name'],
              "이메일" => $row['mail']
          ));
      }
  }

  $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
          file_put_contents('./data/member_list.json', $json);


  /////////////////////////////////////////////////////////////////////////////////

  include_once('./footer.php');
?>