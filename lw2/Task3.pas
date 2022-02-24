PROGRAM Task3(INPUT, OUTPUT);
USES DOS;
VAR
  Query, N: STRING;
  Index, Count: INTEGER;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Query:= GetEnv('QUERY_STRING');
  Index:= POS('name=', Query);
  IF Index = 1
  THEN
    BEGIN
      Index:=6;
      IF POS('&', Query) <> 0
      THEN 
        Count:= POS('&', Query)-Index
      ELSE
        Count:= 100;
      WRITELN('Hello dear, ', COPY(Query, Index, Count), '!')
    END
  ELSE
    WRITELN('Hello, Anonymous!')    
END.
