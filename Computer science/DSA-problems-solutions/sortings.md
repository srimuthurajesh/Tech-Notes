## Basic 
### Bubble sort
```
public class BubbleSort {
    public static void main(String[] args) {
        int[] arr = { 64, 34, 25, 12, 22, 11, 90 };
        bubbleSort(arr);
        System.out.println("Sorted array");
        for (int i = 0; i < arr.length; i++) {
            System.out.print(arr[i] + " ");
        }
    }

    private static void bubbleSort(int[] arr) {
        for(int i=0;i<arr.length;i++){
            for (int j=0;j< arr.length;j++){
                if(arr[i]<arr[j]){
                    arr[i] = arr[i]+arr[j];
                    arr[j] = arr[i]-arr[j];
                    arr[i] = arr[i]+arr[j];
                    break;
                }
            }
        }
    }
}
```

### Selection sort
```
public class SelectionSort {
    public static void main(String[] args) {
        int[] arr = { 64, 34, 25, 12, 22, 11, 90 };
        selectionSort(arr);
        System.out.println("Sorted array");
        for (int i = 0; i < arr.length; i++) {
            System.out.print(arr[i] + " ");
        }
    }

    private static void selectionSort(int[] arr) {
        for(int i=0;i<arr.length;i++){
            int temp=i;
            for (int j=i+1;j<arr.length;j++){
                temp = arr[temp]<arr[j]?temp:j;
            }
            if(temp!=i){
                arr[i] = arr[i]+arr[temp];
                arr[temp] = arr[i]-arr[temp];
                arr[i] = arr[i]-arr[temp];
            }

        }
    }
}
```

### Insertion sort
```
public class Insertion {
    public static void main(String[] args) {
        int[] arr = { 64, 34, 25, 12, 22, 11, 90 };
        insertionSort(arr);
        System.out.println("Sorted array");
        for (int i = 0; i < arr.length; i++) {
            System.out.print(arr[i] + " ");
        }
    }

    private static void insertionSort(int[] arr) {
        //for insertion sort we need to shift the elements to the right
        for(int i=1;i< arr.length;i++){
            int key = arr[i];
            int j= i-1;
            while(j>=0 && arr[j]>key){
                arr[j+1]=arr[j];
                j=j-1;
            }
            arr[j+1]=key;
        }
    }
}

```

## Intermediate
### Merge sort
```
public class MergeSort {
    public static void main(String[] args) {
        int[] arr = {5, 3, 8, 4, 2, 7, 1};
        System.out.println("Original array:");
        printArray(arr);

        mergeSort(arr);

        System.out.println("Sorted array:");
        printArray(arr);
    }
    public static void mergeSort(int[] arr) {
        if (arr == null || arr.length <= 1) {
            return; // Base case: array is already sorted or empty
        }

        int[] helper = new int[arr.length]; // Helper array for merging

        mergeSort(arr, helper, 0, arr.length - 1); // Call helper method
    }

    private static void mergeSort(int[] arr, int[] helper, int low, int high) {
        if (low < high) {
            int mid = (low + high) / 2;
            mergeSort(arr, helper, low, mid); // Sort left half
            mergeSort(arr, helper, mid + 1, high); // Sort right half
            merge(arr, helper, low, mid, high); // Merge sorted halves
        }
    }

    private static void merge(int[] arr, int[] helper, int low, int mid, int high) {
        // Copy both halves into the helper array
        for (int i = low; i <= high; i++) {
            helper[i] = arr[i];
        }

        int helperLeft = low;
        int helperRight = mid + 1;
        int current = low;

        // Iterate through helper array, compare the left and right halves,
        // and merge them back into the original array
        while (helperLeft <= mid && helperRight <= high) {
            if (helper[helperLeft] <= helper[helperRight]) {
                arr[current] = helper[helperLeft];
                helperLeft++;
            } else {
                arr[current] = helper[helperRight];
                helperRight++;
            }
            current++;
        }

        // Copy the rest of the left side of the array into the target array
        int remaining = mid - helperLeft;
        for (int i = 0; i <= remaining; i++) {
            arr[current + i] = helper[helperLeft + i];
        }
    }

    private static void printArray(int[] arr) {
        for (int num : arr) {
            System.out.print(num + " ");
        }
        System.out.println();
    }
}

```

### Quick sort
```
 public class Quicksort {
    public static void main(String[] args) {
        int[] arr = {5, 3, 8, 4, 2, 7, 1};
        System.out.println("Original array:");
        printArray(arr);

        quickSort(arr);

        System.out.println("Sorted array:");
        printArray(arr);
    }

    private static void printArray(int[] arr) {
        for (int num : arr) {
            System.out.print(num + " ");
        }
        System.out.println();
    }

    public static void quickSort(int[] arr) {
        if (arr == null || arr.length == 0) {
            return;
        }
        quickSort(arr, 0, arr.length - 1);
    }

    private static void quickSort(int[] arr, int low, int high) {
        if (low < high) {
            int pi = partition(arr, low, high);
            quickSort(arr, low, pi - 1);
            quickSort(arr, pi + 1, high);
        }
    }

    private static int partition(int[] arr, int low, int high) {
        int pivot = arr[high];
        int i = low - 1;
        for (int j = low; j < high; j++) {
            if (arr[j] < pivot) {
                i++;
                swap(arr, i, j);
            }
        }
        swap(arr, i + 1, high);
        return i + 1;
    }

    private static void swap(int[] arr, int i, int j) {
        int temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }

}

```