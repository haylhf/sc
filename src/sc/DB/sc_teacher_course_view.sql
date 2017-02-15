SELECT
	`tc`.`teacher_id` AS `teacher_id`,
	`t`.`department_id` AS `department_id`,
	`tc`.`id` AS `teacher_course_id`,
	`tc`.`profession_id` AS `profession_id`,
	`tc`.`course_id` AS `course_id`,
	`c`.`course_property` AS `course_property`,
	`c`.`course_type` AS `course_type`,
	`c`.`course_credit` AS `course_credit`,
	`c`.`name` AS `course_name`,
	`b`.`name` AS `building_name`,
	`tc`.`building_id` AS `building_id`,
	`tc`.`course_weekday` AS `course_weekday`,
	`tc`.`course_start_time` AS `course_start_time`,
	`tc`.`course_max_people` AS `course_max_people`,
	`tc`.`remark` AS `remark`
FROM
	(
		(
			(
				`sc_teacher_course` `tc`
				LEFT JOIN `sc_course` `c` ON (
					(`c`.`id` = `tc`.`course_id`)
				)
			)
			LEFT JOIN `sc_building` `b` ON (
				(
					`b`.`id` = `tc`.`building_id`
				)
			)
		)
		LEFT JOIN `sc_teacher` `t` ON (
			(`t`.`id` = `tc`.`teacher_id`)
		)
	)