#### Swap without temp
```
public class SwapWithoutTemp {
    public static void main(String[] args) {
        swap(5, 6);   
    }
    public static void swap(int a, int b){
        a = a + b;
        b = a - b;
        a = a - b;
    }
}
```
#### Count Digits
```
public class CountDigits {
    public static void main(String[] args) {
        System.out.println(countDigits(123456));
    }

    private static int countDigits(int i) {
        int count = 0;
        while (i != 0) {
            i = i / 10;
            count++;
        }
        return count;
    }
}
```
#### Factorial
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
#### Print astreik pattern
```
public class Triangle {
    public static void main(String[] args) {
        printTriangle(6);
    }
    private static void printTriangle(int input) {
        for (int i = 0; i < input / 2; i++) {
            for (int j = 0; j < input; j++) {
                if (input / 2 - i <= j && j <= input / 2 + i) {
                    System.out.print("*");
                } else {
                    System.out.print(" ");
                }
            }
            System.out.println();
        }
    }
}

```
#### Reverse a Number
```
class Reverse {
    public int reverse(int x) {
        int output = 0;

        boolean isNegative = false;
        if (x < 0) {
            x = -1 * x;
            isNegative = true;
        }
        while (x > 0) {
            int reminder = x % 10;
            if (output > Integer.MAX_VALUE / 10 || output * 10 > Integer.MAX_VALUE - reminder)
                return 0;
            output = output * 10 + reminder;
            x = x / 10;
        }
        if (isNegative)
            output = -1 * output;
        return output;
    }
}
```
#### Prime
```
class Solution {
    public int countPrimes() {
        checkPrime(19);
    }

    private void checkPrime(int input){
        boolean isPrime=false;
        for(int i=2;i<=input/2;i++){
            if(input%i==0){
                isPrime=false;
                break;
            }
        }
        if(isPrime)
            System.out.println("prime");
        else
            System.out.println("not prime");
    }
}
```
#### Palindrome
```
public class Palindrome {
    public static void main(String[] args) {
        System.out.println(isPalindrome("malayalam"));
    }
    private static boolean isPalindrome(String input){
        input= input.toLowerCase();
        for(int i=0;i<input.length();i++){
            if(input.charAt(i)!=input.charAt(input.length()-1-i))
                return false;
        }
        return true;
    }
}
```
#### Armsstrong
```
public class Armstrong {
    public static void main(String[] args) {
        System.out.println(isArmstrong(153));
        System.out.println(isArmstrong(1634))
    }
    private static boolean isArmstrong(int input){
        int temp = input;
        int sum = 0;
        while(input>0){
            int rem = input%10;
            sum+=rem*rem*rem;
            input/=10;
        }
        return sum==temp;
    }
    private static boolean isArmstrong(int input){
       int length = String.valueOf(input).length();
       int temp = input;
       int output = 0;
       while (input > 0) {
         output = (int)Math.pow(input % 10, length)+output;
         input/=10;
       }
       return temp==output;
    }
}
```
#### LCM
```
public class LCM {
    public static void main(String[] args) {
        System.out.println(findLCM(6, 9));
    }
    private static int findLCM(int a, int b) {
        // 6 12 18 24 30 36 42 48 54 60
        //    9 18 27 36 45 54 63 72 81 90
        // 18 is LCM
        int temp=(a>b)?a:b;
        while (true) {
            temp+=temp;
            if(temp%a==0 && temp%b==0)
                break;
        }
        return temp;
    }
}
```
#### GCD/HCF 
```
public class GCD {
    public static void main(String[] args) {
        System.out.println(findGCD(12, 15));
    }

    private static int findGCD(int i, int i1) {
        // 12, 24, 36, 48, 60
        // 15, 30, 45, 60
        int temp =i;
        while (true) {
            if(temp%i1==0 && temp%i==0)
                break;
            temp+=i;
        }
        return temp;
    }
}
```