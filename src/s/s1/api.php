<?php   
require_once 'cors.php';  
  require_once 'db.php';  
  $response = array();  
  set_error_handler("customError");

  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){ 

    // if(isset($_GET['Regd_ID'])){  
    // switch($_GET['Regd_ID']){ 
      case 'mail':  
        if($data){ 
          // if(1==1){
            $nm=$data['nm'];
            $phone=$data['phone'];
            $em=$data['em'];
            $tm=date('Y-m-d H:i:s');
            $p="";
            if(isset($data['mCarray'])&& !empty($data['mCarray'])){
              $p=json_encode($data['mCarray']);
              // $nm1 = preg_replace("/[\s_]/", "-", $nm);
              // $url="https://15minuteslogistics.co/#/";
            }
            if(isset($data['msg'])){

              $msg=$data['msg'];
            }else{

              $msg="No message";
            }
            $q1 = "INSERT  INTO emails ( `nm`, `pn`, `em`, `p`, `tm`) VALUES  ('".$nm."','".$phone."','".$em."','".$p."','".$tm."')";
            if($qb2=mysqli_query($conn,$q1)){
              $qa="SELECT * FROM emails  where tm='$tm'";
              $qa1=mysqli_query($conn,$qa);
           
              while($row=@mysqli_fetch_assoc($qa1)){
                $eid=$row["eid"];
              }
              if(isset($data['mCarray'])&& !empty($data['mCarray'])){
                
              $url="https://lmglobalexhibitions.com/#/md/".$eid."/cart";
              }else{

                $url="";
              }
              // $url="http://localhost:8080/#/md/".$eid."/cart";
              // $to = "info@15minuteslogistics.co";
              $to = "vector.pn@gmail.com";
              // $to = "ventor.pn@gmail.com";
              $subject = "Query";
              
              $message = "<h4>Hello, my name is .".$nm."</h4>";
              $message .= "<p><b>Message: </b>.".$msg."</p></br><p><b>Name: </b>.".$nm."</p></br><p><b>Phone no: </b>.".$phone."</p></br><p><b>Email: </b>.".$em."</p></br><p><b>Url: </b>.".$url."</p>";
              
              $header = "From:".$em." \r\n";
              // $header .= "Cc:afgh@somedomain.com \r\n";
              $header .= "MIME-Version: 1.0\r\n";
              $header .= "Content-type: text/html\r\n";
              
              $retval = mail ($to,$subject,$message,$header);
              
              if( $retval == true ) {
                 
                $response['error'] = false;   
                $response['message'] = 'mail sent';
                $response['code'] = 1;
              }else {
                
                $response['error'] = true;   
                $response['message'] = 'mail not sent';
                $response['code'] = 1;
              }
            }else{
              $response['error'] = true;   
              $response['message'] = 'not entered in db';
              $response['q1'] = $q1;
              $response['code'] = 2;
            }
            
         
        }else {
            
            $response['error'] = true;   
            $response['message'] = 'required parameters are not available';
            $response['code'] = 2;
          }
         
        break;
        case 'del_m':  
          if($data){
            // if(1==1){
            // $data=array();
            $id = $data['id'];
            // $pasword = $data['pass'];
            
            $qb="DELETE FROM products WHERE pid='$id'";
            $qb1=mysqli_query($conn,$qb);
            $qa="SELECT * FROM admin  where pid='$id'";
            
          
            sleep(3);
            $qa1=mysqli_query($conn,$qa);
              if($qa1){	             
                $response['error'] = true;   
                $response['message'] = "present";   
                $response['val'] = 2;   
                $response['id'] = $id;   	
              }else{
                $response['error'] = false;   
                $response['message'] = "Deleted";
                $response['val'] = 22;   
                $response['id'] = $id;  
                $response['data'] = $qa1;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
        case 'del_m1':  
          if($data){
            // if(1==1){
            // $data=array();
            $id = $data['id'];
            // $pasword = $data['pass'];
            
            $qb="DELETE FROM services WHERE sid='$id'";
            $qb1=mysqli_query($conn,$qb);
            $qa="SELECT * FROM admin  where sid='$id'";
            
          
            sleep(3);
            $qa1=mysqli_query($conn,$qa);
              if($qa1){	             
                $response['error'] = true;   
                $response['message'] = "present";   
                $response['val'] = 2;   
                $response['id'] = $id;   	
              }else{
                $response['error'] = false;   
                $response['message'] = "Deleted";
                $response['val'] = 22;   
                $response['id'] = $id;  
                $response['data'] = $qa1;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
          case 'del_m3':  
            if($data){
              // if(1==1){
              // $data=array();
              $id = $data['id'];
              // $pasword = $data['pass'];
              
              $qb="DELETE FROM gallery WHERE gid='$id'";
              $qb1=mysqli_query($conn,$qb);
              // $qa="SELECT * FROM admin  where sid='$id'";
              
            
              sleep(3);
              $qa1=mysqli_query($conn,$qb);
                if(!$qa1){	             
                  $response['error'] = true;   
                  $response['message'] = "Error when deleting";   
                  $response['val'] = 2;   
                  $response['id'] = $qa1;   	
                }else{
                  $response['error'] = false;   
                  $response['message'] = "Deleted";
                  $response['val'] = 22;   
                  $response['id'] = $id;  
                  $response['data'] = $id;
                }
             
           
              } else{
                $response['error'] = true;   
                $response['message'] = 'required parameters are not available';
              }
            break;
          case 'del_m2':  
            if($data){
              // if(1==1){
              // $data=array();
              $id = $data['id'];
              // $pasword = $data['pass'];
              
              $qb="DELETE FROM portfolio WHERE pid='$id'";
              $qb1=mysqli_query($conn,$qb);
              $qa="SELECT * FROM admin  where pid='$id'";
              
            
              sleep(3);
              $qa1=mysqli_query($conn,$qa);
                if($qa1){	             
                  $response['error'] = true;   
                  $response['message'] = "present";   
                  $response['val'] = 2;   
                  $response['id'] = $id;   	
                }else{
                  $response['error'] = false;   
                  $response['message'] = "Deleted";
                  $response['val'] = 22;   
                  $response['id'] = $id;  
                  $response['data'] = $qa1;
                }
             
           
              } else{
                $response['error'] = true;   
                $response['message'] = 'required parameters are not available';
              }
            break;
        case 'admin_l':  
          if($data){
            // if(1==1){
            // $data=array();
            $email = $data['email'];
            $pasword = $data['pass'];
            
            $qa="SELECT * FROM admin  where email='$email' and password='$pasword'";
           
            
            $qa1=mysqli_query($conn,$qa);
            $id=0;
            while($row=@mysqli_fetch_assoc($qa1)){
              $id=$row["aid"];
              $name=$row["name"];
            }
              if(@mysqli_num_rows($qa1)>0){	             
                $response['error'] = false;   
                $response['message'] = "ok";   
                $response['val'] = 22;   
                $response['id'] = $id;   
                $response['name'] = $name;	
              }else{
                $response['error'] = false;   
                $response['message'] = 0;
                $response['val'] = 0;   
                $response['id'] = $id;  
                $response['data'] = $qa;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
          
        case 'a_cart':  
          if($data){
            // if(1==1){
            // $data=array();
            $mc = $data['mc'];

            $qa = 'SELECT *  FROM `products`  WHERE `pid` IN (' . implode(',', array_map('intval', $mc)) . ')';

            // $qa="SELECT * FROM products ";
            $qa1=mysqli_query($conn,$qa);
            // $mData=array();
            // $mDataI=array();
            $mOb=[];
            $x=0;
           
            while($row=@mysqli_fetch_assoc($qa1)){
              // $mData[$x]=$row;
              $img=$row["img"];
              $mOb[$x]["pro"]=$row;
              $qb="SELECT * FROM images where mid='".$img."'";
              $qb1=mysqli_query($conn,$qb);
              $x1=0;
              while($row1=@mysqli_fetch_assoc($qb1)){
                
                // $mData[$x][$x1]=$row1;
                $mOb[$x]["im"][$x1]=$row1;
                $x1=$x1+1;
              }
              // $mData[]["img"]=$mDataI[];
              $x=$x+1;
          }
              if(@mysqli_num_rows($qa1)>0){	             
                $response['error'] = false;   
                $response['message'] = "ok";   
                $response['val'] = 2;   
                // $response['id'] = $id;   
                // $response['name'] = $name;	
                  
                $response['data'] = $mOb;
              }else{
                $response['error'] = true;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id;  
                $response['data'] = $qa;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
          
          case 's_cart':  
            if($data){
              // if(1==1){
              // $data=array();
              // if(isset($search)&& $search!==" "&& $search!=="")
              $cid = $data['cid'];
  
              $qa = "SELECT * FROM emails WHERE eid='".$cid."' ";
              $mData=[];
              $qa1=mysqli_query($conn,$qa);
              if(@mysqli_num_rows($qa1)>0){	
              while($row=@mysqli_fetch_assoc($qa1)){
                $mData=$row;
             
              }
        
            $response['error'] = false;   
            $response['message'] = "ok";   
            $response['val'] = 1;   
            $response['d'] =$mData;
  
          }else{
                  $response['error'] = true;   
                  $response['message'] = 0;
                  $response['val'] = 0;   
                  $response['data'] =$qa ;
                }
             
           
              } else{
                $response['error'] = true;   
                $response['message'] = 'required parameters are not available';
              }
            break;
            
          case 'a_search':  
            if($data){
              // if(1==1){
              // $data=array();
              // if(isset($search)&& $search!==" "&& $search!=="")
              $search = $data['search'];
  
              $qa = "SELECT * FROM products WHERE description like '%$search%' or name LIKE '%$search%' ";
  
              // $qa="SELECT * FROM products ";
              $qa1=mysqli_query($conn,$qa);
              $mData=array();
           
              // $mDataI=array();
           
              $x=0;
              if(@mysqli_num_rows($qa1)>0){	
                $row=@mysqli_fetch_assoc($qa1); 
                array_push($mData,$row);
              while($row=@mysqli_fetch_assoc($qa1)){
               
                array_push($mData,$row);
                // $mData[$x]=$row;
                // $name=$row["name"];
                // $description=$row["description"];
  
            }
            $response['error'] = false;   
            $response['message'] = "ok";   
            $response['val'] = 2;   
            // $response['id'] = $id;   
            // $response['name'] = $name;	
              
            $response['data'] =$mData;
  
          }else{
                  $response['error'] = true;   
                  $response['message'] = 0;
                  $response['val'] = 0;   
                  // $response['id'] = $id;  
                  $response['data'] ="not present";
                }
             
           
              } else{
                $response['error'] = true;   
                $response['message'] = 'required parameters are not available';
              }
            break;
            
        case 'a_search_moto':  
          if($data){
            // if(1==1){
            // $data=array();
            // if(isset($search)&& $search!==" "&& $search!=="")
            $search = $data['search'];

            $qa = "SELECT * FROM products WHERE description like '%$search%' and type='Motocycle' or name LIKE '%$search%' and type='Motocycle' ";

            // $qa="SELECT * FROM products ";
            $qa1=mysqli_query($conn,$qa);
            $mData=array();
         
            // $mDataI=array();
         
            $x=0;
            if(@mysqli_num_rows($qa1)>0){	
              $row=@mysqli_fetch_assoc($qa1); 
              array_push($mData,$row);
            while($row=@mysqli_fetch_assoc($qa1)){
             
              array_push($mData,$row);
              // $mData[$x]=$row;
              // $name=$row["name"];
              // $description=$row["description"];

          }
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] =$mData;

        }else{
                $response['error'] = true;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id; 
                
                $response['data1'] =$qa; 
                $response['data'] ="not present";
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
           
        case 'a_search_spare':  
         if($data){
            // if(1==1){
            // $data=array();
            // if(isset($search)&& $search!==" "&& $search!=="")
            $search = $data['search'];
            $qa = "SELECT * FROM products WHERE description like '%$search%' and type='Spareparts' or name LIKE '%$search%'and type='Spareparts'";

            // $qa="SELECT * FROM products ";
            $qa1=mysqli_query($conn,$qa);
            $mData=array();
         
            // $mDataI=array();
         
            $x=0;
            if(@mysqli_num_rows($qa1)>0){	
              $row=@mysqli_fetch_assoc($qa1); 
              array_push($mData,$row);
            while($row=@mysqli_fetch_assoc($qa1)){
             
              array_push($mData,$row);

            }
            $response['error'] = false;   
            $response['message'] = "ok";   
            $response['val'] = 2;   
            // $response['id'] = $id;   
            // $response['name'] = $name;	
              
            $response['data'] =$mData;

       }else{
                $response['error'] = true;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id;  
                $response['data'] =$qa;
              }
           
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
            
  case 'a_m1':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $nm = $data['nm'];
      $qa="SELECT * FROM products where name LIKE '%$nm%' and type='Motocycle'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
                  
  case 'a_s1':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $nm = $data['nm'];
      $qa="SELECT * FROM products where name LIKE '%$nm%' and type='Spareparts'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
           
  case 'a_moto':  
    if($data){
      // if(1==1){
      // $data=array();
      // $email = $data['email'];
      // $pasword = $data['pass'];
      
      $qa="SELECT * FROM products where type='Motocycle'";
      $qa1=mysqli_query($conn,$qa);
      // $mData=array();
      // $mDataI=array();
      $mOb=[];
      $x=0;
     
      while($row=@mysqli_fetch_assoc($qa1)){
        // $mData[$x]=$row;
        $img=$row["img"];
        $mOb[$x]["pro"]=$row;
        $qb="SELECT * FROM images where mid='".$img."'";
        $qb1=mysqli_query($conn,$qb);
        $x1=0;
        while($row1=@mysqli_fetch_assoc($qb1)){
          
          // $mData[$x][$x1]=$row1;
          $mOb[$x]["im"][$x1]=$row1;
          $x1=$x1+1;
        }
        // $mData[]["img"]=$mDataI[];
        $x=$x+1;
		}
        if(@mysqli_num_rows($qa1)>0){	             
          $response['error'] = false;   
          $response['message'] = "ok";   
          $response['val'] = 2;   
          // $response['id'] = $id;   
          // $response['name'] = $name;	
            
          $response['data'] = $mOb;
        }else{
          $response['error'] = false;   
          $response['message'] = 0;
          $response['val'] = 0;   
          // $response['id'] = $id;  
          $response['data'] = $qa1;
        }
     
   
      } else{
        $response['error'] = true;   
        $response['message'] = 'required parameters are not available';
      }
    break;
 
          
    case 'a_spare':  
      if($data){
        // if(1==1){
        // $data=array();
        // $email = $data['email'];
        // $pasword = $data['pass'];
        
        $qa="SELECT * FROM products where type='Spareparts'";
        $qa1=mysqli_query($conn,$qa);
        // $mData=array();
        // $mDataI=array();
        $mOb=[];
        $x=0;
       
        while($row=@mysqli_fetch_assoc($qa1)){
          // $mData[$x]=$row;
          $img=$row["img"];
          $mOb[$x]["pro"]=$row;
          $qb="SELECT * FROM images where mid='".$img."'";
          $qb1=mysqli_query($conn,$qb);
          $x1=0;
          while($row1=@mysqli_fetch_assoc($qb1)){
            
            // $mData[$x][$x1]=$row1;
            $mOb[$x]["im"][$x1]=$row1;
            $x1=$x1+1;
          }
          // $mData[]["img"]=$mDataI[];
          $x=$x+1;
      }
          if(@mysqli_num_rows($qa1)>0){	             
            $response['error'] = false;   
            $response['message'] = "ok";   
            $response['val'] = 2;   
            // $response['id'] = $id;   
            // $response['name'] = $name;	
              
            $response['data'] = $mOb;
          }else{
            $response['error'] = false;   
            $response['message'] = 0;
            $response['val'] = 0;   
            // $response['id'] = $id;  
            $response['data'] = $qa1;
          }
       
     
        } else{
          $response['error'] = true;   
          $response['message'] = 'required parameters are not available';
        }
      break;
  
         
      case 'a_services':  
        if($data){
          // if(1==1){
          // $data=array();
          // $email = $data['email'];
          // $pasword = $data['pass'];
          $qa="SELECT * FROM services ";
          $qa1=mysqli_query($conn,$qa);
          // $mData=array();
          // $mDataI=array();
          $mOb=[];
          $x=0;
         
          while($row=@mysqli_fetch_assoc($qa1)){
            // $mData[$x]=$row;
            $img=$row["img"];
            $mOb[$x]["pro"]=$row;
            $qb="SELECT * FROM images where mid='".$img."'";
            $qb1=mysqli_query($conn,$qb);
            $x1=0;
            while($row1=@mysqli_fetch_assoc($qb1)){
              
              // $mData[$x][$x1]=$row1;
              $mOb[$x]["im"][$x1]=$row1;
              $x1=$x1+1;
            }
            // $mData[]["img"]=$mDataI[];
            $x=$x+1;
        }
            if(@mysqli_num_rows($qa1)>0){	             
              $response['error'] = false;   
              $response['message'] = "ok";   
              $response['val'] = 2;   
              // $response['id'] = $id;   
              // $response['name'] = $name;	
                
              $response['data'] = $mOb;
            }else{
              $response['error'] = false;   
              $response['message'] = 0;
              $response['val'] = 0;   
              // $response['id'] = $id;  
              $response['data'] = $qa1;
            }
         
       
       
          } else{
            $response['error'] = true;   
            $response['message'] = 'required parameters are not available';
          }
        break;
         
      case 'a_gallery':  
        if($data){
   
          $qa="SELECT * FROM gallery ";
          $qa1=mysqli_query($conn,$qa);
      
          $mOb=[];
          $x=0;
         
          while($row=@mysqli_fetch_assoc($qa1)){

            $mOb[$x]["im"][$x]=$row;

            $x=$x+1;
        }
            if(@mysqli_num_rows($qa1)>0){	             
              $response['error'] = false;   
              $response['message'] = "ok";   
              $response['val'] = 2;   
              // $response['id'] = $id;   
              // $response['name'] = $name;	
                
              $response['data'] = $mOb;
            }else{
              $response['error'] = false;   
              $response['message'] = 0;
              $response['val'] = 0;   
              // $response['id'] = $id;  
              $response['data'] = $qa1;
            }
         
       
       
          } else{
            $response['error'] = true;   
            $response['message'] = 'required parameters are not available';
          }
        break;
            
      case 'v_gallery':  
        if($data){
   
          $qa="SELECT * FROM gallery ";
          $qa1=mysqli_query($conn,$qa);
      
          $mOb=[];
          $x=0;
         
          while($row=@mysqli_fetch_assoc($qa1)){

            $mOb[$x]=$row;

            $x=$x+1;
        }
            if(@mysqli_num_rows($qa1)>0){	             
              $response['error'] = false;   
              $response['message'] = "ok";   
              $response['val'] = 2;   
              // $response['id'] = $id;   
              // $response['name'] = $name;	
                
              $response['data'] = $mOb;
            }else{
              $response['error'] = false;   
              $response['message'] = 0;
              $response['val'] = 0;   
              // $response['id'] = $id;  
              $response['data'] = $qa1;
            }
         
       
       
          } else{
            $response['error'] = true;   
            $response['message'] = 'required parameters are not available';
          }
        break;
         
        case 'a_portfolio':  
          if($data){
            // if(1==1){
            // $data=array();
            // $email = $data['email'];
            // $pasword = $data['pass'];
            $qa="SELECT * FROM portfolio ";
            $qa1=mysqli_query($conn,$qa);
            // $mData=array();
            // $mDataI=array();
            $mOb=[];
            $x=0;
           
            while($row=@mysqli_fetch_assoc($qa1)){
              // $mData[$x]=$row;
              $img=$row["img"];
              $mOb[$x]["pro"]=$row;
              $qb="SELECT * FROM images where mid='".$img."'";
              $qb1=mysqli_query($conn,$qb);
              $x1=0;
              while($row1=@mysqli_fetch_assoc($qb1)){
                
                // $mData[$x][$x1]=$row1;
                $mOb[$x]["im"][$x1]=$row1;
                $x1=$x1+1;
              }
              // $mData[]["img"]=$mDataI[];
              $x=$x+1;
          }
              if(@mysqli_num_rows($qa1)>0){	             
                $response['error'] = false;   
                $response['message'] = "ok";   
                $response['val'] = 2;   
                // $response['id'] = $id;   
                // $response['name'] = $name;	
                  
                $response['data'] = $mOb;
              }else{
                $response['error'] = false;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id;  
                $response['data'] = $qa1;
              }
           
         
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
        case 'h_services':  
          if($data){
            // if(1==1){
            // $data=array();
            // $email = $data['email'];
            // $pasword = $data['pass'];
            $qa="SELECT * FROM services limit 3";
            $qa1=mysqli_query($conn,$qa);
            // $mData=array();
            // $mDataI=array();
            $mOb=[];
            $x=0;
           
            while($row=@mysqli_fetch_assoc($qa1)){
              // $mData[$x]=$row;
              $img=$row["img"];
              $mOb[$x]["pro"]=$row;
              $qb="SELECT * FROM images where mid='".$img."'";
              $qb1=mysqli_query($conn,$qb);
              $x1=0;
              while($row1=@mysqli_fetch_assoc($qb1)){
                
                // $mData[$x][$x1]=$row1;
                $mOb[$x]["im"][$x1]=$row1;
                $x1=$x1+1;
              }
              // $mData[]["img"]=$mDataI[];
              $x=$x+1;
          }
              if(@mysqli_num_rows($qa1)>0){	             
                $response['error'] = false;   
                $response['message'] = "ok";   
                $response['val'] = 2;   
                // $response['id'] = $id;   
                // $response['name'] = $name;	
                  
                $response['data'] = $mOb;
              }else{
                $response['error'] = false;   
                $response['message'] = 0;
                $response['val'] = 0;   
                // $response['id'] = $id;  
                $response['data'] = $qa1;
              }
           
         
         
            } else{
              $response['error'] = true;   
              $response['message'] = 'required parameters are not available';
            }
          break;
        case 'a_up':
  // $all=file_get_contents('php://input');
  // echo "all: ".extract($_POST);
  if(isTheseParametersAvailable(array('nm'))){
    
    $nm=$_POST["nm"];
    $desc=$_POST["desc"];
    $type=$_POST["type"];
    $am=$_POST["am"];
    // $un=
    // $pr=$_POST["pr"];
    // $co=$_POST["co"];
    // $sb=$_POST["sb"];
    // $lo=$_POST["lo"];



    function file_already_uploaded($file_name,$c)
   {
    $query1 = "SELECT * FROM products WHERE img = '".$file_name."'";
    $qb3=mysqli_query($c,$query1);
  
    if(@mysqli_num_rows($qb3)>0)
    {
     return true;
    }
    else
    {
     return false;
    }
   }
  // var_dump($data);
  
    $mArray=array();
    $q1 = "Select * from images   ORDER BY id DESC limit 1";
    $mid=0;
    $q1a=mysqli_query($conn,$q1);
    if(@mysqli_num_rows($q1a)>0){
			while($row=@mysqli_fetch_assoc($q1a)){
        $mid=$row["id"];
		}
	}
    $mid=$mid+1;

    sleep(3);

    for($count=0; $count<count($_FILES["files"]["name"]); $count++)
    {
     $file_name = $_FILES["files"]["name"][$count];
     $tmp_name = $_FILES["files"]['tmp_name'][$count];
     $file_array = explode(".", $file_name);
     $file_extension = end($file_array);
     $c=$conn;
     if(file_already_uploaded($file_name,$c))
     {
      $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     }
    // $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     
   if(!is_dir('files/'.$nm)){
     mkdir('files/'.$nm);
   }
     $location = 'files/'.$nm.'/'. $file_name;
     
      
    
     if(move_uploaded_file($tmp_name, $location))
     {

      array_push($mArray,$location);
     

      $query = "
      INSERT INTO images (loc, mid) 
      VALUES ('".$location."','".$mid."')";

      $qb2=mysqli_query($conn,$query);
      
      $response['message'] = 'failed uploaded';
     }else{
      $response['message'] = 'error failed upload';
      //  echo"error failed upload";
     }
    }
 
  
    
    // $q1 = "INSERT INTO property (name, unit, price,co,sb,lo) VALUES ('".$nm."', '".$un."', '".$pr."', '".$co."', '".$sb."', '".$lo."' )";

    $query = "INSERT INTO products (img, price,description,type,name) VALUES ('".$mid."','".$am."','".$desc."','".$type."','".$nm."')";
    $qb1=mysqli_query($conn,$query);

    if($qb1){
      $response['message'] = $query;
    }

    
    // $response['message'] = $_FILES;
  }else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available1';   
  } 
  break;  

case 'a_up1': 

  if(isTheseParametersAvailable(array('heading','desc'))){
    
    $heading=$_POST["heading"];
    $desc=$_POST["desc"];
    $nm=$heading;



    function file_already_uploaded($file_name,$c)
   {
    $query1 = "SELECT * FROM services WHERE img = '".$file_name."'";
    $qb3=mysqli_query($c,$query1);
  
    if(@mysqli_num_rows($qb3)>0)
    {
     return true;
    }
    else
    {
     return false;
    }
   }
  // var_dump($data);
  
    $mArray=array();
    $q1 = "Select * from images   ORDER BY id DESC limit 1";
    $mid=0;
    $q1a=mysqli_query($conn,$q1);
    if(@mysqli_num_rows($q1a)>0){
			while($row=@mysqli_fetch_assoc($q1a)){
        $mid=$row["id"];
		}
	}
    $mid=$mid+1;

    sleep(3);

    for($count=0; $count<count($_FILES["files"]["name"]); $count++)
    {
     $file_name = $_FILES["files"]["name"][$count];
     $tmp_name = $_FILES["files"]['tmp_name'][$count];
     $file_array = explode(".", $file_name);
     $file_extension = end($file_array);
     $c=$conn;
     if(file_already_uploaded($file_name,$c))
     {
      $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     }
    // $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     
   if(!is_dir('files/'.$nm)){
     mkdir('files/'.$nm);
   }
     $location = 'files/'.$nm.'/'. $file_name;
     
      
    
     if(move_uploaded_file($tmp_name, $location))
     {

      array_push($mArray,$location);
     

      $query = "
      INSERT INTO images (loc, mid) 
      VALUES ('".$location."','".$mid."')";

      $qb2=mysqli_query($conn,$query);
      
      $response['message'] = 'failed uploaded';
     }else{
      $response['message'] = 'error failed upload';
      //  echo"error failed upload";
     }
    }
 
  
    $query = "INSERT INTO services (head, description,img) VALUES ('".$heading."','".$desc."','".$mid."')";
    $qb1=mysqli_query($conn,$query);

    if($qb1){
      $response['code'] = 1;
      $response['message'] = "Successfully added";
    }else{
      $response['code'] = 2;
      $response['message'] = "Not added";
    }

    
    // $response['message'] = $_FILES;
  }else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available';   
} 
break;


case 'a_up2': 

  if(isTheseParametersAvailable(array('desc'))){
    
    $desc=$_POST["desc"];
    $nm="folio";



    function file_already_uploaded($file_name,$c)
   {
    $query1 = "SELECT * FROM portfolio WHERE img = '".$file_name."'";
    $qb3=mysqli_query($c,$query1);
  
    if(@mysqli_num_rows($qb3)>0)
    {
     return true;
    }
    else
    {
     return false;
    }
   }
  // var_dump($data);
  
    $mArray=array();
    $q1 = "Select * from images   ORDER BY id DESC limit 1";
    $mid=0;
    $q1a=mysqli_query($conn,$q1);
    if(@mysqli_num_rows($q1a)>0){
			while($row=@mysqli_fetch_assoc($q1a)){
        $mid=$row["id"];
		}
	}
    $mid=$mid+1;

    sleep(3);

    for($count=0; $count<count($_FILES["files"]["name"]); $count++)
    {
     $file_name = $_FILES["files"]["name"][$count];
     $tmp_name = $_FILES["files"]['tmp_name'][$count];
     $file_array = explode(".", $file_name);
     $file_extension = end($file_array);
     $c=$conn;
     if(file_already_uploaded($file_name,$c))
     {
      $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     }
    // $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     
   if(!is_dir('files/'.$nm)){
     mkdir('files/'.$nm);
   }
     $location = 'files/'.$nm.'/'. $file_name;
     
      
    
     if(move_uploaded_file($tmp_name, $location))
     {

      array_push($mArray,$location);
     

      $query = "
      INSERT INTO images (loc, mid) 
      VALUES ('".$location."','".$mid."')";

      $qb2=mysqli_query($conn,$query);
      
      $response['message'] = 'failed uploaded';
     }else{
      $response['message'] = 'error failed upload';
      //  echo"error failed upload";
     }
    }
 
  
    $query = "INSERT INTO portfolio ( description,img) VALUES ('".$desc."','".$mid."')";
    $qb1=mysqli_query($conn,$query);

    if($qb1){
      $response['code'] = 1;
      $response['message'] = "Successfully added";
    }else{
      $response['code'] = 2;
      $response['message'] = "Not added";
    }

    
    // $response['message'] = $_FILES;
  }else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available';   
} 
break;


case 'a_up3': 

  if(isTheseParametersAvailable(array('heading',))){
    
    $heading=$_POST["heading"];
    $nm=$heading;
    $mck=2;


    function file_already_uploaded($file_name,$c)
   {
    $query1 = "SELECT * FROM gallery WHERE url = '".$file_name."'";
    $qb3=mysqli_query($c,$query1);
  
    if(@mysqli_num_rows($qb3)>0)
    {
     return true;
    }
    else
    {
     return false;
    }
   }
  // var_dump($data);
  
  //   $mArray=array();
  //   $q1 = "Select * from images   ORDER BY id DESC limit 1";
  //   $mid=0;
  //   $q1a=mysqli_query($conn,$q1);
  //   if(@mysqli_num_rows($q1a)>0){
	// 		while($row=@mysqli_fetch_assoc($q1a)){
  //       $mid=$row["id"];
	// 	}
	// }
  //   $mid=$mid+1;

    sleep(3);

    for($count=0; $count<count($_FILES["files"]["name"]); $count++)
    {
     $file_name = $_FILES["files"]["name"][$count];
     $tmp_name = $_FILES["files"]['tmp_name'][$count];
     $file_array = explode(".", $file_name);
     $file_extension = end($file_array);
     $c=$conn;
     if(file_already_uploaded($file_name,$c))
     {
      $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     }
    // $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
     
   if(!is_dir('files/'.$nm)){
     mkdir('files/'.$nm);
   }
     $location = 'files/'.$nm.'/'. $file_name;
     
      
    
     if(move_uploaded_file($tmp_name, $location))
     {

      array_push($mArray,$location);
     

      $query = "
      INSERT INTO gallery (url) 
      VALUES ('".$location."')";

      $qb2=mysqli_query($conn,$query);
      
      $response['message'] = 'failed uploaded';
     }else{
      $mck=3;
      $response['message'] = 'error failed upload';
      //  echo"error failed upload";
     }
    }
 

    if($mck==2){
      $response['code'] = 1;
      $response['message'] = "Successfully added";
    }else{
      $response['code'] = 2;
      $response['message'] = "Not added";
    }

    
    // $response['message'] = $_FILES;
  }else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available';   
} 
break;





default:   
 $response['error'] = true;   
 $response['message'] = 'Invalid Operation Called';  
}  
}  
else{  
 $response['error'] = true;   
 $response['message'] = 'Invalid API Call';  
  } 
  
try
{
    echo json_encode($response);
    // echo "s".$response;
}
catch (ErrorException $e)
{
    // do some thing with $e->getMessage()
	$response['message']=$e->getMessage();
  echo json_encode($response);
 
}
  
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}

function isTheseParametersAvailable($params){  
foreach($params as $param){  
 if(!isset($_POST[$param])){  
     return false;   
  }  
}  
return true;   
}  

function mType($id,$conn){  
	$qb="select type from units where id='$id'";
	$qb1=mysqli_query($conn,$qb);
	if(@mysqli_num_rows($qb1)>0){
			while($row=@mysqli_fetch_assoc($qb1)){
			$type=$row["type"];
		}
		return $type;
	}else{
		return "null";
	}			
}
function mImgz($id,$conn){  
	$qb="select name from img where pnm='$id'";
	$qb1=mysqli_query($conn,$qb);
	if(@mysqli_num_rows($qb1)>0){
			while($row=@mysqli_fetch_assoc($qb1)){
			$type=$row["name"];
		}
		return $type;
	}else{
		return "null";
	}			
}
function mUp($id,$type,$conn){  
	$qb="select type from units where id='$id'&& type='$type'";
	$qb1=mysqli_query($conn,$qb);
	if(@mysqli_num_rows($qb1)>0){
		
		return true;
	}else{
		return false;
	}			
}
 function column_into_keys(array $array): array {

  // get the name of the column that contains the record id
  $key = key($array[0]);

  foreach($array as $row) {

      // pop the new key off the top of the array
      $id = array_shift($row);

      // is there only one item left in the array?
      if (count($row) == 1)
          // get the first value
          $result[$id] = current($row);
      else
          // get all of the values
          $result[$id] = $row;
  }

  return $result;
}
?>  