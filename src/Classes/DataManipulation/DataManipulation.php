<?php

namespace App\DataManipulation;

use PDO;
use PDOException;
use App\DbConnection\DbConnection as DB;

class DataManipulation extends DB
{
    public function selectLogin()
    {
        $sql = "SELECT * FROM tbprofile";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }

    public function emailIsExist($email)
    {
        $sql = "SELECT * FROM tbprofile where email= '" . $email . "' ";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetch();
        return $res;
    }

    public $username, $email, $password, $id, $user_type, $code;
    public function setData($data)
    {
        if (array_key_exists('username', $data)) {
            $this->username = $data['username'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('u_type', $data)) {
            $this->user_type = $data['u_type'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if (array_key_exists('emailToken', $data)) {
            $this->code = $data['emailToken'];
        }
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
    }

    public function insertRegisterData()
    {
        $encpass = md5($this->password);
        $dataArray = array($this->username, $this->email, $encpass, $this->id, $this->user_type, $this->code);
        $sql = "insert into tbprofile(USER_name, email, encpass, id, user_type, CODE, created_on)VALUES (?, ?, ?, ?, ?, ?, now())";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function emailIsExits($email)
    {
        $sql = "select email from users WHERE  email='" . $email . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function varification($otp, $mail)
    {
        $sql = "select emailtoken from users WHERE email = '" . $mail . "' &&  emailtoken='" . $otp . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function checkToken($mail, $otp)
    {
        $sql = "SELECT * FROM tbprofile WHERE email='" . $mail . "' and CODE = '" . $otp . "' ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function tokenUpdate($mail, $otp)
    {
        $sql = "update tbprofile  set status = 1  WHERE email = '" . $mail . "' and code = '" . $otp . "' ";
        $res = $this->conn->exec($sql);
        return $res;
    }

    // login
    public  function checkUser($mail, $password, $userType)
    {

        $sql = "SELECT * FROM tbprofile WHERE email='" . $mail . "' and encpass = '" . $password . "' and user_type = '" . $userType . "' ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function otpUpdate($mail, $token)
    {
        $sql = "update tbprofile  set code = '" . $token . "'  WHERE email = '" . $mail . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function updatePassword($mail, $pass)
    {
        $sql = "update tbprofile  set encpass = '" . $pass . "'  WHERE email = '" . $mail . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function recoverEmailToken($mail, $otp)
    {
        $sql = "select emailtoken from users WHERE email = '" . $mail . "' &&  recover='" . $otp . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function updateUserPassword($user_id, $re_pass)
    {
        $array = array($re_pass);
        $sql = "update  users set pass=? WHERE email ='" . $user_id . "'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public  function updateUserInfo($id, $name, $email, $image)
    {

        $sql = "update tbprofile set user_name='" . $name . "', image = '" . $image . "' WHERE email ='" . $email . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function updateUserData($id, $name, $email)
    {

        $sql = "update tbprofile set user_name='" . $name . "' WHERE email ='" . $email . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }

    public function addStaff($name, $u_id)
    {
        $dataArray = array($name, $u_id);
        $sql = "INSERT INTO tb_staff_details (staff_name, staff_u_id) VALUES (?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function addBuildingsInfo($name, $floor)
    {
        $dataArray = array($name, $floor);
        $sql = "INSERT INTO tb_building(building_name, total_floor) VALUES (?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function selectBuildingData()
    {
        $sql = "select * from tb_building";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function addFloorInfo($name, $building_id, $total_room)
    {
        $dataArray = array($name, $building_id, $total_room);
        $sql = "INSERT INTO tb_floor_info(title, building_id, total_room) VALUES (? , ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function selectFloorData()
    {
        $sql = "select * from tb_floor_info";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function selectFloorDataByBuildingId($b_id)
    {
        $sql = "select * from tb_floor_info where building_id = '" . $b_id . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function addRoomInfo($name, $building_id, $floor_id, $total_room)
    {
        $dataArray = array($name, $building_id,  $floor_id, $total_room);
        $sql = "INSERT INTO tb_room_info ( building_id, floor_id, seat_capacity, title) VALUES(? , ?, ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function selectRoomData()
    {
        $sql = "select * from tb_room_info";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function selectStudentsDataByEmail($email)
    {
        $sql = "SELECT p.* FROM tbprofile p INNER JOIN tb_student_details s ON s.user_id = p.user_id where email = '" . $email . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function studentDetailsInsert($user_id, $dept_id, $batch_id, $mobile_number, $alt_mobile_number, $linkedin_address, $github_address)
    {
        $dataArray = array($user_id, $dept_id, $batch_id, $mobile_number, $alt_mobile_number, $linkedin_address, $github_address);
        $sql = "INSERT INTO tb_student_details( user_id, dept_id, batch_id, mobile_number, alt_mobile_number,
        linkedin_address, github_address) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public  function updateStudentInfo($user_id, $image)
    {

        $sql = "update tbprofile set  image = '" . $image . "' WHERE user_id ='" . $user_id . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public function selectStudentsByDeptAndSection($dept_id, $section_id)
    {
        $sql = "SELECT 
                    *
                FROM 
                    tbprofile p
                    INNER JOIN tb_student_details s ON p.user_id = s.user_id
                WHERE 
                    dept_id = '" . $dept_id . "'
                 AND batch_id = '" . $section_id . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function selectStudentsList()
    {
        $sql = "SELECT  * FROM tbprofile p INNER JOIN tb_student_details s ON p.user_id = s.user_id";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function selectCSEStudentsList()
    {
        $sql = "SELECT  * FROM tbprofile p INNER JOIN tb_student_details s ON p.user_id = s.user_id";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function selectExamSchedule()
    {
        $sql = "SELECT *, (SELECT title FROM tb_room_info WHERE room_id = ex.room_id) AS room_name FROM exam_schedule ex ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function addExamInfo($user_id, $exam_title, $subject, $room_id, $date, $start_time, $end_time, $dept_id, $batch_id)
    {
        $dataArray = array($user_id, $exam_title, $subject, $room_id, $date, $start_time, $end_time, $dept_id, $batch_id);
        $sql = "INSERT INTO exam_schedule (user_id,  exam_title, subject_title, room_id, date, start_time, end_time, dept_id, batch_id) VALUES(?,  ?, ?, ?, ? , ?,  ?, ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function selectExamScheduleDataBySemester($exam_title, $batch_id)
    {
        $sql = "SELECT * FROM exam_schedule WHERE exam_title = '".$exam_title."' and batch_id = '".$batch_id."' limit 1";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function selectExamScheduleDataByFilter($room_id, $batch_id, $date, $start_time)
    {
        $sql = "SELECT * FROM exam_schedule WHERE DATE = '".$date."' and start_time = '".$start_time."' and room_id = '".$room_id."' limit 1";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function selectExamScheduleTotalBatchData($room_id, $batch_id, $date, $start_time)
    {
        $sql = "SELECT count(exam_schedule) as total_student FROM exam_schedule WHERE  room_id = '".$room_id."' and DATE = '".$date."' and start_time = '".$start_time."' and batch_id = '".$batch_id."' ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function selectExamScheduleDataByRoom($user_id, $batch_id, $room_id)
    {
        $sql = "SELECT * FROM exam_schedule WHERE user_id = '".$user_id."' and batch_id = '".$batch_id."' and room_id = '".$room_id."'  limit 1";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function selectExamScheduleStudentByExamTitleAndId($subject, $user_id)
    {
        $sql = "SELECT * FROM exam_schedule WHERE user_id = '".$user_id."' and subject_title = '".$subject."'  limit 1";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }

    public function seleclTotalDataForDashBoard()
    {
        $sql = "SELECT (SELECT COUNT(user_id) FROM tbprofile WHERE user_type = 'teacher') AS total_teacher,
        (SELECT COUNT(user_id) FROM tbprofile WHERE user_type = 'moderator') AS total_moderator, 
        (SELECT COUNT(user_id) FROM tbprofile WHERE user_type = 'student') AS total_student, 
        (SELECT COUNT(room_id) FROM tb_room_info ) AS total_room ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function selectExamScheduleByUserId($user_id)
    {
        $sql = "SELECT *, (SELECT title FROM tb_room_info WHERE room_id = ex.room_id) AS room_name FROM exam_schedule ex where ex.user_id = '".$user_id."' ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
    public function selectTeachersList()
    {
        $sql = "SELECT  * FROM tbprofile where user_type='teacher'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }

    public function checkExitsTeacher($user_id, $date)
    {
        $sql = "SELECT *  FROM tb_teacher_exam_schedule WHERE USER_id = '".$user_id."'limit 1";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function checkExitsTeacherByDateAndTime($date, $start_time, $room_id)
    {
        $sql = "SELECT *  FROM tb_teacher_exam_schedule WHERE date = '".$date."' and start_time = '".$start_time."' and room_id = '".$room_id."'limit 1";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public function addTeacherInfo($user_id, $room_id, $room_name, $date, $start_time, $end_time)
    {
        $dataArray = array($user_id, $room_id, $room_name, $date, $start_time, $end_time);
        $sql = "INSERT INTO tb_teacher_exam_schedule(user_id, room_id, room_name, DATE, start_time, end_time) VALUE(?,?,?,?,?,?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function selectAssignTeacherList()
    {
        $sql = "SELECT tp.*, tt.* FROM tbprofile tp
        INNER JOIN tb_teacher_exam_schedule tt ON tp.user_id = tt.user_id";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }

    public function selectAssignTeacherSchedule($user_id)
    {
        $sql = "SELECT tp.*, tt.* FROM tbprofile tp
        INNER JOIN tb_teacher_exam_schedule tt ON tp.user_id = tt.user_id where tp.user_id = '".$user_id."'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }

    public function selectBuildingDetailsInfo()
    {
        $sql = "SELECT *, (SELECT building_name FROM tb_building WHERE building_id = tr.building_id) AS building_name FROM tb_room_info tr";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetchAll();
        return $data;
    }
}
