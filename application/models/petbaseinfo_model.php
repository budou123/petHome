<?php

/**
 * PetBaseInfoModel
 * 宠物PO对象。包括数据库增删改查
 */
class PetBaseInfoModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Getter for all pets base info
     * @return array an array with several objects (the results)
     */
    public function getAllPetInfo()
    {
        $sql = "SELECT * FROM petbaseinfo";
		$query = $this->db->prepare($sql);
		$query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single note
     * @param int $note_id id of the specific note
     * @return object a single object (the result)
     */
    public function getPet($pet_id)
    {
        $sql = "SELECT pet_id,pet_fullName,pet_type,pet_origin,pet_alias,pet_englishName,pet_weight,pet_life,pet_train,pet_guard,pet_speciality,pet_lossHair,pet_smelly,pet_height_man,pet_height_women,pet_somatotype FROM petbaseinfo WHERE pet_id = :pet_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':pet_id' => $pet_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a pet (create)
     * @param array $model  that will be created
     * @return bool feedback (was the note created properly ?)
     */
    public function create($model)
    {
    	
        $sql = "INSERT INTO petbaseinfo (note_text, user_id) VALUES (:note_text, :user_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':note_text' => $note_text, ':user_id' => $_SESSION['user_id']));
        
        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Setter for a note (update)
     * @param int $note_id id of the specific note
     * @param string $note_text new text of the specific note
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($note_id, $note_text)
    {
        // clean the input to prevent for example javascript within the notes.
        $note_text = strip_tags($note_text);

        $sql = "UPDATE notes SET note_text = :note_text WHERE note_id = :note_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':note_id' => $note_id, ':note_text' => $note_text, ':user_id' => $_SESSION['user_id']));
        
        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_EDITING_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Deletes a specific note
     * @param int $note_id id of the note
     * @return bool feedback (was the note deleted properly ?)
     */
    public function delete($note_id)
    {
        $sql = "DELETE FROM notes WHERE note_id = :note_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':note_id' => $note_id, ':user_id' => $_SESSION['user_id']));
        
        $count =  $query->rowCount();
        
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_DELETION_FAILED;
        }
        // default return
        return false;
    }
}
