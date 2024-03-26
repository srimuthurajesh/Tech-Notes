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
