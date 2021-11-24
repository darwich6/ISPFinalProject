DROP TABLE IF EXISTS User;

CREATE TABLE User(
  Subject_Number INT(4) NOT NULL,
  Course_Number INT(3),
  Course_Name CHAR(100),
  Credits DOUBLE,
  Mathematic_Statistics_Logic BOOLEAN,
  Speaking BOOLEAN,
  Writing_First_Course BOOLEAN,
  Writing_Second_Course BOOLEAN,
  Arts BOOLEAN,
  Humanities BOOLEAN,
  Natural_Science BOOLEAN,
  Natural_Science_LAB BOOLEAN,
  Social_Science BOOLEAN,
  Domestic_Diversity BOOLEAN,
  Global_Diversity BOOLEAN,
  Capstone BOOLEAN,
  Complex_Issues_Facing_Society BOOLEAN,
  PRIMARY KEY (Subject_Number, Course_Number)
);
