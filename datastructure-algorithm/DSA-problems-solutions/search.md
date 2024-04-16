### Binary Search. 
```
public class BinarySearch {
    public static void main(String[] args) {
        int[] nums = {3,2};
        int target = 2;
        System.out.println(search   (nums, target));
    }
   
    public static int search(int[] nums, int target) {
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
### Search Insert Position.
```
class Solution {
    public int searchInsert(int[] nums, int target) {
        int left = 0;
        int right = nums.length - 1;
        int middle = left + ((right - left) / 2);;
        while (left < right) {
            if (nums[middle] == target)
                return middle;
            if(left==right-1) {
                middle = nums[left]<target?right:left;
                break;
            }
            if (nums[middle] < target)
                left = middle + 1;
            if (nums[middle] > target)
                right = middle - 1;
            middle = left + ((right - left) / 2);
        }
        return nums[middle] < target ? middle + 1 : middle ;
    }
}
``` 
