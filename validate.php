<?php 

    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $year_of_birth = $_POST['year_of_birth'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $national_id = $_POST['national_id'];
    $church = $_POST['church'];
    $pastorate = $_POST['pastorate'];
    $area = $_POST['area'];
    $ward = $_POST['ward'];
    $sub_county = $_POST['sub_county'];
    $county = $_POST['county'];
    
    $age = '';
    $full_namenk = $_POST['full_namenk'];
    $gendernk = $_POST['gendernk'];
    $year_of_birthnk = $_POST['year_of_birthnk'];
    $phone_nonk = $_POST['phone_nonk'];
    $emailnk = $_POST['emailnk'];
    $national_idnk = $_POST['national_idnk'];
    $relationship = $_POST['relationship'];
    $picture ='';
    $imagePath = '';
    $imagePathnk = '';

    if (!$full_name) { 
        $errors[] = "Full name is required"; 
    }
    if (!$gender) { 
        $errors[] = "Gender is required"; 
    }
    if (!$national_id) { 
        $errors[] = "National ID is required"; 
    }
    if (!$church) { 
        $errors[] = "Church is required"; 
    }
    if (!$area) { 
        $errors[] = "Area is required"; 
    }
    if (!$ward) { 
        $errors[] = "Ward is required"; 
    }
    if (!$sub_county) { 
        $errors[] = "Sub_county is required"; 
    }
    if (!$county) { 
        $errors[] = "County is required"; 
    }
    if (!$pastorate) { 
        $errors[] = "Pastorate is required"; 
    }
    if (!$year_of_birth) { 
        $errors[] = "Date of birth is required"; 
    }
    if (!$phone_no) { 
        $errors[] = "Phone number is required"; 
    }
    if (!$email) { 
        $errors[] = "Email is required"; 
    }
    // if ($_POST['email'] === $email) {
    //   $errors[] = "Email already exists";
    // }
    if (!$full_namenk) { 
        $errors[] = "Name of next kin is required"; 
    }
    
    if (!$year_of_birthnk) { 
        $errors[] = "Next year of birth is required"; 
    }
    if (!$gendernk) { 
        $errors[] = "Gender of next of kin is required"; 
    }
    if (!$phone_nonk) { 
        $errors[] = "Phone number of next of kin is required"; 
    }
    if (!$relationship) { 
        $errors[] = "Relationship is required"; 
    }
    if (!$emailnk) { 
        $errors[] = "Email of next of kin is required"; 
    }

    // if ($_POST['emailnk'] === $emailnk) {
    //   $errors[] = "Email already exists";
    // }

    if (!is_dir('Pastorpic')) {
            mkdir('Pastorpic');
    }

    if (!is_dir('Pastorpicnk')) {
            mkdir('Pastorpicnk');
    }
    if (empty($errors)) {
        $picture = $_FILES['picture'] ?? null;
        $imagePath = $pastors['picture'];
       
        $picturenk = $_FILES['picturenk'] ?? null;
        $imagePathnk = $pastors['picturenk'];
        

        if ($picture && $picture['tmp_name']) {
             if ($pastors['picture']) {
            unlink($pastors['picture']);
        }
            $imagePath = 'Pastorpic/' . randomString(8) . '/' . $picture['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($picture['tmp_name'], $imagePath);
        }

        if ($picturenk && $picturenk['tmp_name']) {
            if ($pastors['picturenk']) {
            unlink($pastors['picturenk']);
        }
            $imagePathnk = 'Pastorpicnk/' . randomString(8) . '/' . $picturenk['name'];
            mkdir(dirname($imagePathnk));
            move_uploaded_file($picturenk['tmp_name'], $imagePathnk);
        }
}
 ?>