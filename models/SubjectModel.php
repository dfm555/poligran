<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class SubjectModel extends DbTables {

    static function getAll() {
        $db = new DbTables();
        $db->query('SELECT * FROM tbl_subject');
        return $db->query_result();
    }

    static function findbyid($id) {
        $db = new DbTables();
        $db->query('SELECT *
                    FROM tbl_subject
                    WHERE id_subject =' . (int) $id);
        return $db->query_result();
    }

    static function insert($data) {
        $db = new DbTables();
        $db->query('INSERT INTO tbl_subject (code,
						name,
						quantity_credits,
						cycle,
						room,
                                                description,
                                                weekly_hours,
                                                place_available)
			VALUES (
				"' . $data['code'] . '",
				"' . $data['name'] . '",
				"' . $data['credits'] . '",
				"' . $data['cycle'] . '",
				"' . $data['room'] . '",
                                "' . $data['description'] . '",
                                "' . $data['hours'] . '",
                                "' . $data['place'] . '")');
        return $db->query_insert_id();
    }

    static function update($data) {
        $db = new DbTables();
        $db->query('UPDATE tbl_subject SET name ="' . $data['name'] . '",
		quantity_credits ="' . $data['credits'] . '",
		cycle ="' . $data['cycle'] . '",
		room ="' . $data['room'] . '",
		description ="' . $data['description'] . '",
                weekly_hours ="' . $data['hours'] . '",
                place_available ="' . $data['place'] . '"
			WHERE id_subject = "' . $data['id_subject'] . '"');
        return true;
    }

    static function delete($data) {
        $db = new DbTables();
        $db->query('DELETE FROM tbl_subject WHERE id_subject = "' . $data['id_subject'] . '"');
        return true;
    }

}
