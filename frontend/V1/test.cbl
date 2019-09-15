*****************************************************************
*   The following is a COBOL version of the query               *
*   callable interface *** DSQABFCO **.                         *
*****************************************************************
 IDENTIFICATION DIVISION.                                       
 PROGRAM-ID.  DSQABFCO.                                         
   DATE-COMPILED.                                               
 ENVIRONMENT DIVISION.                                          
 DATA DIVISION.                                                 
 WORKING-STORAGE SECTION.                                       
*****************************************************************
* Copy DSQCOMMB definition - contains query interface variables *
*****************************************************************
   COPY DSQCOMMB.                                               
                                                                
* Query interface commands                                      
 01  STARTQI      PIC X(5)  VALUE "START".                      
 01  SETG         PIC X(10) VALUE "SET GLOBAL".                 
 01  QUERY        PIC X(12) VALUE "RUN QUERY Q1".               
 01  REPT         PIC X(22) VALUE "PRINT REPORT (FORM=F1 ".     
 01  ENDQI        PIC X(4)  VALUE "EXIT".            
                                                     
* Query command length                               
 01  QICLTH       PIC 9(8) USAGE IS COMP-4.          
* Number of variables                                
 01  QIPNUM       PIC 9(8) USAGE IS COMP-4.          
* Keyword variable lengths                           
 01  QIKLTHS.                                        
   03   KLTHS     PIC 9(8) OCCURS 10 USAGE IS COMP-4.
* Value Lengths                                      
 01  QIVLTHS.                                        
   03   VLTHS     PIC 9(8) OCCURS 10 USAGE IS COMP-4.
* Start command keyword                              
 01  SNAMES.                                         
   03  SNAME1   PIC X(8) VALUE "DSQSMODE".           
* Start command keyword value                        
 01  SVALUES.                                        
   03  SVALUE1  PIC X(11) VALUE "INTERACTIVE".       
* Set GLOBAL command variable names to set           
01  VNAMES.                                         
   03  VNAME1   PIC X(7) VALUE "MYVAR01".            
   03  VNAME2   PIC X(5) VALUE "SHORT".              
   03  VNAME3   PIC X(7) VALUE "MYVAR03".            
* Variable value parameters                          
 01  VVALUES.                                        
   03   VVALS     PIC 9(8) OCCURS 10 USAGE IS COMP-4.
                                                     
 01   TEMP     PIC 9(8)           USAGE IS COMP-4.   
 PROCEDURE DIVISION.                                 
*                                                    
* Start a query interface session                    
     MOVE DSQ-CURRENT-COMM-LEVEL TO DSQ-COMM-LEVEL.  
     MOVE 5 TO QICLTH.                               
     MOVE 8 TO KLTHS(1).                             
     MOVE 11 TO VLTHS(1).                            
     MOVE 1 TO QIPNUM.                               
     CALL DSQCIB  USING DSQCOMM, QICLTH, STARTQI,    
                        QIPNUM, QIKLTHS, SNAMES,     
*                                                                 
* Set numeric values into query variables using SET GLOBAL command
     MOVE 10 TO QICLTH.                                           
     MOVE 7 TO KLTHS(1).                                          
     MOVE 5 TO KLTHS(2).                                          
     MOVE 7 TO KLTHS(3).                                          
     MOVE 4 TO VLTHS(1).                                          
     MOVE 4 TO VLTHS(2).                                          
     MOVE 4 TO VLTHS(3).                                          
     MOVE 20 TO VVALS(1).                                         
     MOVE 40 TO VVALS(2).                                         
     MOVE 84 TO VVALS(3).                                         
     MOVE 3 TO QIPNUM.                                            
     CALL DSQCIB  USING DSQCOMM, QICLTH, SETG,                    
                        QIPNUM, QIKLTHS, VNAMES,                  
                        QIVLTHS, VVALUES, DSQ-VARIABLE-FINT.      
*                                                                 
* Run a query                                                     
     MOVE 12 TO QICLTH.                        
     CALL DSQCIB USING DSQCOMM, QICLTH, QUERY. 
*                                              
* Print the results of the query               
     MOVE 22 TO QICLTH.                        
     CALL DSQCIB USING DSQCOMM, QICLTH, REPT.  
*                                              
* End the query interface session              
     MOVE 4 TO QICLTH.                         
     CALL DSQCIB USING DSQCOMM, QICLTH, ENDQI. 
                                               
     STOP RUN.                                 