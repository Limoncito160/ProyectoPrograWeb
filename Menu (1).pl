%%%%%%%%%%%%%%%%%%%.%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
tablas_multiplicar(11).
tablas_multiplicar(N) :-
    write('Tabla de multiplicar del '), write(N), nl,
    tabla_multiplicar(N, 1),
    nl,
    N1 is N + 1,
    tablas_multiplicar(N1).

tabla_multiplicar(_, 11).
tabla_multiplicar(N, M) :-
    R is N * M,
write(N), write(' x '), write(M), write(' = '), write(R), nl,
    M1 is M + 1,
    tabla_multiplicar(N, M1).

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

    promedio(0,0).
promedio(M,S):-nl,write('Coloque la cantidad disponible del producto '),write(M),nl,read(C),
               (((C<0),write('La cantidad de productos no debe ser menor a 0'),nl,promedio(M,S));
               (M1 is M-1, promedio(M1,S1), S is S1+C)).
product(0).
product(A):- nl,A1 is A-1,product(A1),nl,
            write('Coloque la cantidad de productos de la categoria '),write(A),nl,read(M),
            (((M<0;M==0),write('La cantidad de productos debe ser mayor a 0'),product(A));
            (M>0,promedio(M,S),R is S/M,write('El promedio de producto disponible de la categoria '),write(A),write(' es: '),write(R),nl)).

main:- nl,write('Coloque con cuantas categorias cuenta la empresa '),nl,read(A),
       (((A<0;A==0),write('El numero de categorias debe de ser mayor a 0'),nl,main);
       product(A)).


%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

fibonacci(0, 0).
fibonacci(1, 1).
fibonacci(N, F) :-
  N > 1,
  N1 is N-1,
  N2 is N-2,
  fibonacci(N1, F1),
  fibonacci(N2, F2),
  F is F1 + F2.

print_fibonacci_sum(N) :-
  print_fibonacci_sum(N, 0, 0).

print_fibonacci_sum(0, Sum, _) :-
  write('Suma: '), write(Sum), nl.

print_fibonacci_sum(N, Sum, Prev) :-
  (N < 30, N > 0  ->
    fibonacci(N, F),
    Sum1 is Sum + F,
    write(F), nl,
    N1 is N - 1,
    print_fibonacci_sum(N1, Sum1, F)
    ;
    write('¡Valor incorrecto!'), nl,
    write('Ingresa un valor distinto (Min: 1 | Max: 30)')
  ).

  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%55

contar_petalos(0, 0).
contar_petalos(N, Total) :-
    N > 0,
    write("¿Cuántos pétalos tiene la flor? "),
    read(Petalos),
    N1 is N - 1,
    contar_petalos(N1, Total1),
    Total is Total1 + Petalos.

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%5%%%%%

serie(X,0).
serie(X,Y):-
Y1 is Y-1,
fact(Y,F),
N is F,
pot(X,N,R),write(R),nl,
serie(X,Y1).

main:-
write('Introduce el numero a calcular el factorial: '),
read(N),
fact(N,F),
write(F).

pot(X,0,1).
pot(X,N,R):-
N1 is N-1,
pot(X,N1,R1),
R is R1*X.

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

factorial(0,1).  %CASO_BASE
suma(1,1). %CASO_BASE
factorial(N,F):-  %FUNCION_1
        N1 is N-1,
        factorial(N1,F1),  %LLAMADA_A_LA_FUCNION_1
        F is  N*F1.
suma(N,R):-        %FUNCION_2
       factorial(N,F),
        N1 is N-1,
        suma(N1,R1), %LLAMADA_A_LA_FUCNION_2
        R is F+R1.

suma_de_factoriales :-
    write('Ingrese un número: '),
    read(N),
    suma(N, R),
    write('El resultado de la suma de factoriales es: '),
    write(R),
    nl.
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


fact(0,1). 
fact(N,F):- 
        
    N1 is N-1,
    fact(N1,F1), 
    F is N*F1.
main:-write('Introduce el numero a calcular el factorial: '),
     read(N),fact(N,F),write(F).


pot(X,0,1).
pot(X,N,R):-
            N1 is N-1,
            pot(X,N1,R1),
            R is R1*X.
serie(X,0).
serie(X,Y):-
            Y1 is Y-1,
            fact(Y,F),
            N is F,
            pot(X,N,R),write(R),nl,
            serie(X,Y1).

main4:-write('Ingresa X: '),read(X),write('Ingresa y: '),read(Y),
        (X>4,Y<9,serie(X,Y)).







%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
menu :-
    write('M E N U'), nl,
    write('Selecciona una opcion: '), nl,
    write('1. Tablas de multiplicar, Ixchel Garcia'), nl,
    write('2. Promedio de productos, Rafael Dotor'), nl,
    write('3. Suma Fibonacci, Sergio Robledo'), nl,
    write('4. Petalos de una flor,Luis Villegas '), nl,
    write('5. Suma de factoriales, Sheydel Somera'), nl,
    write('6. Serie, Maria Garcia'), nl,
    write('7. Salir'), nl,
    read(Opcion),
    (
        Opcion = 1 ->
            tablas_multiplicar(1),
            menu % Llamada recursiva al menú principal, nl,nl,
        ;
        Opcion = 2 ->
           main,
            menu % Llamada recursiva al menú principal
        ;
        Opcion = 3 ->
             write('Ingresa un número entre 1 y 30: '), nl,
            read(N),
            print_fibonacci_sum(N), nl,nl,
            menu % Llamada recursiva al menú principal
        ;
        Opcion = 4 ->
            write("Ingresa el número de flores: "),
            read(NumFlores),
            contar_petalos(NumFlores, Total),
            write("El total de pétalos es: "),
            write(Total),
            nl,nl,
            menu % 
        ;
        Opcion = 5 ->
        suma_de_factoriales,nl,nl,
            menu % 
        ;
        Opcion = 6 ->
        main4,nl,nl,
            menu % 
        ;
        Opcion = 7 ->
            write('Saliendo del programa...'), nl
        ;
            write('Opcion no valida, ingresa un numero del 1 al 7.'), nl,nl,
            menu 
    ).
