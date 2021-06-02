import java.util.Scanner;
class Switch{
     
     void choice(int a){
     int x;
     x=a;
     switch(x){
     case 1:
      System.out.println("monday");
      break;
     case 2:
     System.out.println("tuesday");
     break;
     case 3:
     System.out.println("wednesday");
     break;
     case 4:
     System.out.println("thursday");
     case 5:
     System.out.println("friday");
     case 6:
     System.out.println("saturday");
     break;
     case 7:     
     System.out.println("sunday");
     break;
     default:
     System.out.println("default");
     break;
    }
  }
  public static void main(String[] args)
     {
       System.out.println("enter choice");
       Switch obj=new Switch();
       Scanner sc=new Scanner(System.in);
       int k=sc.nextInt();
       obj.choice(k);
     }
  

}