<?php

class CourseController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function createCourse() {
        if ($this->session->checkLogin()) {
            if ($this->session->checkProf()) {
                // get Categories
                $categorieModel = $this->loadModel("categorie");
                $catList = $categorieModel->query("select * from categories");
                $this->view->set("catList", $catList);

                $this->view->render('course' . DS . 'createCourse', true, true);
            }
        } else {
            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function createCourseAction() {

        if ($this->session->checkLogin()) {
            print_r($_POST);
            $courseModel = $this->loadModel("course");
            $titre = !empty($_POST['titre']) ? $_POST['titre'] : $error[] = true;
            $categorie = !empty($_POST['categorie']) ? $_POST['categorie'] : $error[] = true;
            $description = !empty($_POST['description']) ? $_POST['description'] : $error[] = true;
            $document = isset($_FILES["document"]["name"]) ? $_FILES["document"]["name"] : $error[] = true;
            $video = !empty($_POST['video']) ? $_POST['video'] : $error[] = true;
            $niveau = !empty($_POST['niveau']) ? $_POST['niveau'] : $error[] = true;

            $idGenerated = $this->generateRandomString();


            /* To replace special chars and spaces ! */
            $documentName = str_replace(' ', '_', $document);

            $e = array("é", "è", "ê", "ë");
            $target_file3 = str_replace($e, "e", $documentName);

            $i = array("ï", "î");
            $target_file4 = str_replace($i, "i", $target_file3);

            $o = array("ö", "ô");
            $target_file5 = str_replace($o, "o", $target_file4);

            $u = array("ù", "û", "ü");
            $target_file6 = str_replace($u, "u", $target_file5);

            $a = array("ä", "â", "à");
            $target_file7 = str_replace($a, "a", $target_file6);


            $courseModel->save(array("idcategorie" => $categorie, "idprof" => $this->session->user("id"),
                "titre" => $titre, "description" => $description, "date" => date("Y/m/d"), "doc" => $target_file7,
                "video" => $video, "lvl" => $niveau
            ));
            $this->uploadFileToServer();

            $this->redirect('user/index');
        } else {

            $this->session->setNotification("Vous devez vous connecter pour accéder à cette page", "info");
            $this->redirect('user/login');
        }
    }

    public function uploadFileToServer() {
        $target_dir = 'docs' . DS;
        $target_file = $target_dir .  basename($_FILES["document"]["name"]);

        /* To replace special chars and spaces ! */
        $target_file2 = str_replace(' ', '_', $target_file);

        $e = array("é", "è", "ê", "ë");
        $target_file3 = str_replace($e, "e", $target_file2);

        $i = array("ï", "î");
        $target_file4 = str_replace($i, "i", $target_file3);

        $o = array("ö", "ô");
        $target_file5 = str_replace($o, "o", $target_file4);

        $u = array("ù", "û", "ü");
        $target_file6 = str_replace($u, "u", $target_file5);

        $a = array("ä", "â", "à");
        $target_file7 = str_replace($a, "a", $target_file6);
        
        
        $uploadOk = 1;
        $pdfFileType = pathinfo($target_file7, PATHINFO_EXTENSION);

        if (isset($_POST["submit"])) {
            $check = filesize($_FILES["document"]["tmp_name"]);
            if ($check !== false) {
                echo "File is a PDF - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not a PDF.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file7)) {
            $this->session->setNotification("Fichier existe deja", "warning");
            $this->redirect('course/createCourse');
            $uploadOk = 0;
        }

        if ($_FILES["document"]["size"] > 5000000) {
            $this->session->setNotification("La taille du Fichier dépasse la limite", "warning");
            $this->redirect('course/createCourse');
            $uploadOk = 0;
        }

        if ($pdfFileType != "pdf") {
            $this->session->setNotification("Que les Fichiers de format PDF sont accéptés", "warning");
            $this->redirect('course/createCourse');
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $this->session->setNotification("Fichier non télécharger", "warning");
            $this->redirect('course/createCourse');
        } else {
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file7)) {
                echo "The file " . basename($_FILES["document"]["name"]) . " has been uploaded.";
            } else {
                echo basename($_FILES["document"]["name"]);
                $this->session->setNotification("Erreur dans le téléchargement du Fichier", "warning");
                $this->redirect('course/createCourse');
            }
        }
    }

    //liste des cours abonnée
    public function courseAbonnee() {
        $courseModel = $this->loadModel("course"); // nom  de la classe course
        $courseList = $courseModel->query('SELECT * FROM courses as c, followers as f, users as u, categories as ca WHERE f.iduser = ' . $this->session->user("id") . ' and f.iduser= u.id and f.idcourse = c.id and c.idcategorie = ca.id');

        $this->view->set("coursAbonnee", $courseList);

        $this->view->render('course' . DS . 'follow', true, true); // index c'est une vue
    }

    //liste des cours 
    public function allcourse() {
        $courseModel = $this->loadModel("course"); // nom  de la classe course
        $allcourse = $courseModel->query('SELECT c.id , c.titre , ca.categorie , u.nom , c.lvl FROM courses as c, users as u, categories as ca WHERE u.id = c.idprof and c.idcategorie = ca.id order by id desc');
        $this->view->set("allcourse", $allcourse);

        $this->view->render('course' . DS . 'allcours', true, true); // index c'est une vue
    }

    public function showCourseStudent($id) {
        $iduser = $this->session->user("id");
        $courseModel = $this->loadModel("course"); // nom  de la classe course
        //$course = $courseModel->query('SELECT * FROM courses as c, users as u WHERE c.id = ' . $id . ' and  u.id = c.idprof');
        $course = $courseModel->query('SELECT c.id as idcourse, u.nom as nom, c.titre as titre, c.description as description,'
                . 'c.video as video, c.doc as doc, c.lvl as lvl FROM courses as c, users as u WHERE c.id = ' . $id . ' and  u.id = c.idprof');

        $abo = $courseModel->query('SELECT COUNT(*)as n FROM courses as c , users as u , followers as f where f.iduser =  ' . $iduser . ' and f.idcourse = ' . $id . ' and c.id = ' . $id . ' and u.id = ' . $iduser);

        $evaluationModel = $this->loadModel('evaluation');
        $evaluation = $evaluationModel->findFirst(array(
            'fields' => 'evaluations.id as id, evaluations.titre as titre, evaluations.date as date',
            'conditions' => array("evaluations.idcourse" => $id)
        ));

        $this->view->set("showCourse", $course);
        $this->view->set("abo", $abo);
        $this->view->set("evaluation", $evaluation);
        $this->view->render('course' . DS . 'course', true, true); // index c'est une vue
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function abonnement($id) {
        $iduser = $this->session->user("id");
        $courseModel = $this->loadModel("course");
        $aboModel = $this->loadModel("course");
        $abo = $courseModel->query('SELECT COUNT(*)as n FROM courses as c , users as u , followers as f where f.iduser =  ' . $iduser . ' and f.idcourse = ' . $id . ' and c.id = ' . $id . ' and u.id = ' . $iduser);
        foreach ($abo as $t) {
            $n = $t->n;
        }
        //echo $n . ', '. $iduser . ', ' . $id ;
        $req = 'INSERT INTO followers (iduser, idcourse) VALUES (' . $iduser . ', ' . $id . ')';
        //echo $req;
        if ($n == 0) {
            // $aboModel->save(array("iduser" => $iduser, "idcourse" => $id));
            $aboModel->query2($req);
            //echo 's abo';
        }
        //echo '1';
        if ($n == 1) {
            $courseModel->query2('DELETE FROM followers WHERE iduser = ' . $iduser . ' and idcourse = ' . $id);


            //echo ' se desabo';
        }
        $course = $courseModel->query('SELECT c.id as idcourse, u.nom as nom, c.titre as titre, c.description as description,'
                . 'c.video as video, c.doc as doc, c.lvl as lvl FROM courses as c, users as u WHERE c.id = ' . $id . ' and  u.id = c.idprof');

        $abo = $courseModel->query('SELECT COUNT(*)as n FROM courses as c , users as u , followers as f where f.iduser =  ' . $iduser . ' and f.idcourse = ' . $id . ' and c.id = ' . $id . ' and u.id = ' . $iduser);
        $this->view->set("showCourse", $course);
        $this->view->set("abo", $abo);
        $this->view->render('course' . DS . 'course', true, true);
    }

    public function signaler($id) {
        $iduser = $this->session->user("id");
        $courseModel = $this->loadModel("course");
        $aboModel = $this->loadModel("course");
        $abo = $courseModel->query('SELECT COUNT(*)as n FROM courses as c , users as u , reports as f where f.iduser =  ' . $iduser . ' and f.idcourse = ' . $id . ' and c.id = ' . $id . ' and u.id = ' . $iduser);
        foreach ($abo as $t) {
            $n = $t->n;
        }
        // echo $n . ', '. $iduser . ', ' . $id ;
        $req = 'INSERT INTO reports (iduser, idcourse) VALUES (' . $iduser . ', ' . $id . ')';
        //echo $req;
        if ($n == 0) {
            // $aboModel->save(array("iduser" => $iduser, "idcourse" => $id));
            $aboModel->query2($req);
            echo "<script>alert(\"Votre signalisation a été prise en compte.\")</script>";
            //echo 's abo';
        }
//        echo '1';
        if ($n == 1) {
            echo "<script>alert(\"Vous avez deja signaler ce cours\")</script>";
//           $courseModel->query2('DELETE FROM followers WHERE iduser = '. $iduser . ' and idcourse = ' . $id );
//        echo ' se desabo';
        }
        $course = $courseModel->query('SELECT c.id as idcourse, u.nom as nom, c.titre as titre, c.description as description,'
                . 'c.video as video, c.doc as doc, c.lvl as lvl FROM courses as c, users as u WHERE c.id = ' . $id . ' and  u.id = c.idprof');

        $abo = $courseModel->query('SELECT COUNT(*)as n FROM courses as c , users as u , followers as f where f.iduser =  ' . $iduser . ' and f.idcourse = ' . $id . ' and c.id = ' . $id . ' and u.id = ' . $iduser);
        $this->view->set("showCourse", $course);
        $this->view->set("abo", $abo);
        $this->view->render('course' . DS . 'course', true, true);
    }

    public function updateCourseAction($id) {
        $courseModel = $this->loadModel("course");
        $titre = strtolower($_POST['titre']);
        $categorie = $_POST['categorie'];
        $description = strtolower($_POST['description']);
        $document = !empty($_POST['document']) ? $_POST['document'] : $error[] = true . 'noDocument';
        $video = !empty($_POST['video']) ? $_POST['video'] : $error[] = true . 'NoVideo';
        $niveau = !empty($_POST['niveau']) ? $_POST['niveau'] : $error[] = true . 'NoNiveau';

        $req = 'UPDATE courses as c SET c.doc = "' . $document . '" , c.idcategorie = "' . $categorie . '", c.titre = "' . $titre . '" , c.description = "' . $description . '", c.video ="' . $video . '", c.lvl = ' . $niveau . '  WHERE c.id = ' . $id;
        $courseModel->query($req);

        echo $req;
        $this->redirect('course/courseList');
    }

    public function moncourse($id) {
        if ($this->session->checkProf()) {
            $courseModel = $this->loadModel("course");
            $moncourse = $courseModel->query("select c.id as id , c.lvl as lvl , c.doc as doc , c.video as video , c.titre as titre , c.description as description , c.idcategorie as categorie from courses as c , categories as ca where c.id = " . $id . " and c.idcategorie = ca.id");

            $this->view->set("moncourse", $moncourse);

            $categorieModel = $this->loadModel("categorie");
            $catList = $categorieModel->query("select * from categories");
            $this->view->set("catList", $catList);

            $this->view->render('course' . DS . 'moncours', true, true); // index c'est une vue
        } else {
            $this->redirect("error/error403");
        }
    }

    public function courseList() {
        if ($this->session->checkProf()) {
            $courseModel = $this->loadModel("course");
            $id = $this->session->read('user')->id;

            $courseList = $courseModel->query("select c.id as id , c.titre as titre , c.date as date , ca.categorie as categorie , (select count(re.idcourse) from reports as re where idcourse= c.id) as Nb from users as u , courses as c , categories as ca where u.id = " . $id . " and u.id = c.idprof and c.idcategorie = ca.id  order by id desc");

            $this->view->set("courseList", $courseList);
            $this->view->render('course' . DS . 'courseList', true, true); // index c'est une vue
        } else {
            $this->redirect("error/error403");
        }
    }

    public function deleteCourse($id) {
        if ($this->session->checkProf()) {
            $courseModel = $this->loadModel("course");
            $courseModel->delete($id);
            $this->session->setNotification("Votre requête a été traitée avec succès", "success");
            $this->redirect("/course/courseList");
        } else {
            $this->redirect("error/error403");
        }
    }

}

?>
