#### 01. Swap without temp
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
#### 03. Reverse a Number
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
