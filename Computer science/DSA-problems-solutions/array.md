## Easy
### Fine Second Largest element
```
public class LargestNumber {
    public static void main(String[] args) {
        int[] arr = {5, 3, 8, 4, 2, 7, 1};
        System.out.println("Original array:");
        int max = findLargestNumber(arr);
        System.out.println("The largest number is: " + max);
        System.out.println("The Second number is: " + findSecondLargestNumber(arr));
    }
    private static int findSecondLargestNumber(int[] arr) {
        int firstLargest = arr[0];
        int secondLargest = 0;
        for (int i = 1; i < arr.length; i++) {
            if (arr[i] > firstLargest) {
                secondLargest = firstLargest;
                firstLargest = arr[i];
            } else if (arr[i] > secondLargest) {
                secondLargest = arr[i];
            }
        }

        return secondLargest;
    }
    private static int findLargestNumber(int[] arr) {
        int max = arr[0];
        for (int i = 1; i < arr.length; i++) {
            if (arr[i] > max) {
                max = arr[i];
            }
        }

        return max;
    }
}

```