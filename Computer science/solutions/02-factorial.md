```
public class Main {
    public static void main(String[] args) {
        System.out.println(findFactorial(-6));
    }
    public static int findFactorial(int input){
        int output = 1;
        while(input>0){
            output*=input;
            input--;
        }
        while(input<0){
            output*=input;
            input++;
        }
       return output;
    }
}
```
