<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class SubjectModel extends MasterModel {

	static $table = 'tbl_subject';

	static function findbyid($id) {
		static::query('SELECT *
                    FROM tbl_subject
                    WHERE id_subject =' . (int) $id);
		return static::query_result();
	}

	static function insert($data) {
		static::query('INSERT INTO tbl_subject (code,
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
		return static::query_insert_id();
	}

	static function update($data) {
		static::query('UPDATE tbl_subject SET name ="' . $data['name'] . '",
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
		static::query('DELETE FROM tbl_subject WHERE id_subject = "' . $data['id_subject'] . '"');
		return true;
	}

}
