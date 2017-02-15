SELECT
	`v`.`teacher_id` AS `teacher_id`,
	`v`.`department_id` AS `department_id`,
	`v`.`teacher_course_id` AS `teacher_course_id`,
	`v`.`profession_id` AS `profession_id`,
	`v`.`course_id` AS `course_id`,
	`v`.`course_property` AS `course_property`,
	`v`.`course_type` AS `course_type`,
	`v`.`course_credit` AS `course_credit`,
	`v`.`course_name` AS `course_name`,
	`v`.`building_name` AS `building_name`,
	`v`.`building_id` AS `building_id`,
	`v`.`course_weekday` AS `course_weekday`,
	`v`.`course_start_time` AS `course_start_time`,
	`v`.`course_max_people` AS `course_max_people`,
	`v`.`remark` AS `remark`,
	`d`.`name` AS `department_name`
FROM
	(
		`sc_teacher_course_view` `v`
		LEFT JOIN `sc_department` `d` ON (
			(
				`d`.`id` = `v`.`department_id`
			)
		)
	)