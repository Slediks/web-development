PROGRAM Task4(INPUT, OUTPUT);
USES DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Query: STRING;
  Index, EndIndex: INTEGER;
BEGIN
  Query:= GetEnv('QUERY_STRING');
  Index:= POS(Key, Query);
  GetQueryStringParameter:= '';

  IF Index = 0
  THEN
    Exit;

  Index:= Index+LENGTH(Key)+1;
  Query:= COPY(Query, Index, LENGTH(Query));
  EndIndex:= POS('&', Query);

  IF EndIndex = 0
  THEN
    GetQueryStringParameter:= Query
  ELSE
    GetQueryStringParameter:= COPY(Query, 1, EndIndex-1)
END;

BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END.
