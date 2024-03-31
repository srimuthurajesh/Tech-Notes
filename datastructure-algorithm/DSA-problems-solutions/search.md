### Binary Search. 
```
public class BinarySearch {
    public static void main(String[] args) {
        int[] nums = {3,2};
        int target = 2;
        System.out.println(search2(nums, target));
    }
    public static int search(int[] nums, int target) {
        int i = 0;
        int j = nums.length-1;

        while (i <= j) {
            int middle = i + ((j-i)/2);
            if(i==middle)
                middle=j;
            if (nums[middle] == target)
                return middle;
            else if(middle==j)
                return -1;
            else if (nums[middle] < target)
                i = middle;
            else
                j = middle;
        }
        return -1;
    }
    public static int search2(int[] nums, int target) {
        int left = 0;
        int right = nums.length - 1;

        while (left <= right) {
            int middle = left + (right - left) / 2;
            if (nums[middle] == target) {
                return middle;
            } else if (nums[middle] < target) {
                left = middle + 1;
            } else {
                right = middle - 1;
            }
        }
        return -1;
    }
}

```
