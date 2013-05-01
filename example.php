<?php

spl_autoload_register(function ($classname) {
	$classname = ltrim($classname, "\\");
	preg_match('/^(.+)?([^\\\\]+)$/U', $classname, $match);
	$classname = str_replace("\\", "/", $match[1]) . str_replace(["\\", "_"], "/", $match[2]). ".php";
	print "class " . $classname . "\n";
	require 'fimbulvetr/' . $classname;
});

$arrStatements = array(
	array(
		'sql' => 'SELECT 1',
		'comment' => 'parse time simplest query:',
		'calcPositions' => false
	),
	array(
		/*You can use the constuctor for parsing.  The parsed statement is stored at the ->parsed property.*/
		'sql' => 'REPLACE INTO table (a,b,c) VALUES (1,2,3)',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'REPLACE INTO table (a,b,c) VALUES (1,2,3)',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SELECT a,b,c from some_table an_alias where d > 5;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => true
	),
	array(
		'sql' => 'SELECT a,b,c from some_table an_alias join `another` as `another table` using(id) where d > 5;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => true,
		'noConstruct' => true
	),
	array(
		'sql' => 'SELECT a,b,c from some_table an_alias join (select d, max(f) max_ffrom some_tablewhere id = 37 group by d) `subqry` on subqry.d = an_alias.d where d > 5;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => '(select `c2`, `c```, \"quoted \'string\' \\\" with `embedded`\\\"\\\" quotes\" as `an``alias` from table table)
UNION ALL (select `c2`, `c```, \"quoted \'string\' \\\" with `embedded`\\\"\\\" quotes\" as `an``alias` from table table)',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => '(select `c2`, `c```, \"quoted \'string\' \\\" with `embedded`\\\"\\\" quotes\" as `an``alias` from table table)
UNION  (select `c2`, `c```, \"quoted \'string\' \\\" with `embedded`\\\"\\\" quotes\" as `an``alias` from table table)',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'select `c2`, `c```, \"quoted \'string\' \\\" with `embedded`\\\"\\\" quotes\" as `an``alias` from table table',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'alter table xyz add key my_key(a,b,c), drop primay key',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'INSERT INTO table (a,b,c) VALUES (1,2,3)
  ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id), c=3;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'UPDATE t1 SET col1 = col1 + 1, col2 = col1;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'DELETE FROM t1, t2 USING t1 INNER JOIN t2 INNER JOIN t3
WHERE t1.id=t2.id AND t2.id=t3.id;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'delete low_priority partitioned_table.* from partitioned_table where partition_id = 1;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'UPDATE t1 SET col1 = col1 + 1, col2 = col1;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'insert into partitioned_table (partition_id, some_col) values (1,2);',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'delete from partitioned_table where partition_id = 1;',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'insert into partitioned_table (partition_id, some_col) values (1,2);',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SELECT 1',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLE STATUS',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLES',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLES',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLES',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'select DISTINCT 1+2   c1, 1+ 2 as
`c2`, sum(c2),"Status" = CASE
        WHEN quantity > 0 THEN \'in stock\'
        ELSE \'out of stock\'
        END
, t4.c1, (select c1+c2 from t1 inner_t1 limit 1) as subquery into @a1, @a2, @a3 from t1 the_t1 left outer join t2 using(c1,c2) join t3 as tX on tX.c1 = the_t1.c1 natural join t4 t4_x using(cX)  where c1 = 1 and c2 in (1,2,3, "apple") and exists ( select 1 from some_other_table another_table where x > 1) and ("zebra" = "orange" or 1 = 1) group by 1, 2 having sum(c2) > 1 ORDER BY 2, c1 DESC LIMIT 0, 10 into outfile "/xyz" FOR UPDATE LOCK IN SHARE MODE',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => '(select 1, 1, 1, 1 from dual dual1) union all (select 2, 2, 2, 2 from dual dual2) union all (select c1,c2,c3,sum(c4) from (select c1,c2,c3,c4 from a_table where c2 = 1) subquery group by 1,2,3) limit 10',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'select DISTINCT 1+2   c1, 1+ 2 as
`c2`, sum(c2),"Status" = CASE
        WHEN quantity > 0 THEN "in stock"
        ELSE "out of stock"
        END
, t4.c1, (select c1+c2 from t1 table limit 1) as subquery into @a1, @a2, @a3 from `table` the_t1 left outer join t2 using(c1,c2) join
(select a, b, length(concat(a,b,c)) from ( select 1 a,2 b,3 c from some_Table ) table ) subquery_in_from join t3 as tX on tX.c1 = the_t1.c1 natural join t4 t4_x using(cX)  where c1 = 1 and c2 in (1,2,3, "apple") and exists ( select 1 from some_other_table another_table where x > 1) and ("zebra" = "orange" or 1 = 1) group by 1, 2 having sum(c2) > 1 ORDER BY 2, c1 DESC LIMIT 0, 10 into outfile "/xyz" FOR UPDATE LOCK IN SHARE MODE
UNION ALL
SELECT NULL,NULL,NULL,NULL,NULL FROM DUAL LIMIT 1',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLES',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLES',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
	array(
		'sql' => 'SHOW TABLES',
		'comment' => 'parse time very somewhat simple statement:',
		'calcPositions' => false
	),
);

foreach ($arrStatements as $arrStatement) {
	$start = microtime(true);
	$sql = $arrStatement['sql'];
	if (array_key_exists('noConstruct', $arrStatement) && $arrStatement['noConstruct']) {
		$parser = new \PHPSQL\Parser($sql);
		$parsed = $parser->parsed;
	} else {
		$parser = new \PHPSQL\Parser();
		$parsed = $parser->parse($sql);
	}

	$stop = microtime(true);
	$total = $stop - $start;
	print "parsed in " . round($total, 2) . ": " . $sql . "\n\n" ;
	print_r($parsed);
	print "\n\n";
}

