```
public class Pattern {
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
