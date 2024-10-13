## Easy
### Fine Second Largest element

```java
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
---
## Two Sum

```java
class Solution {
    public int[] twoSum(int[] nums, int target) {
        Map<Integer, Integer> tempMap = new HashMap<Integer, Integer>();
        for(int i=0;i<nums.length;i++){
            if(tempMap.get(nums[i])!=null){
                return new int[]{tempMap.get(nums[i]), i};

            }
            tempMap.put(target-nums[i], i);
        }
        return new int[2];
    }
}
```
---
## Best Time to Buy and Sell Stock

```java
class Solution {
    public int maxProfit(int[] prices) {
        int min=prices[0];
        int res=0;
        for(int i=1;i<prices.length;i++){
            if(min>prices[i])
                min = prices[i];
            if(res<(prices[i]-min))
                res = prices[i]-min;    
        }
        return res;
    }
}
```
--- 
## Contains Duplicate

```java
class Solution {
    public boolean containsDuplicate(int[] nums) {
        Set<Integer> set = new HashSet<Integer>();
        for(int num:nums){
            if(!set.add(num)){
                return true;
            }
        }
        return false;       
    }
}
```

---
## Product of Array Except Self

```java
class Solution {
    public int[] productExceptSelf(int[] nums) {
        int[] result = new int[nums.length];
        result[0] = nums[0];
        for (int i = 1; i < nums.length; i++) {
            result[i] = nums[i] * result[i - 1];
        }
        int temp;
        result[nums.length - 1] = result[nums.length - 2];
        temp = nums[nums.length - 1];
        for (int j = nums.length - 2; j > 0; j--) {
            result[j] = result[j - 1] * temp;
            temp = temp * nums[j];
        }
        result[0]=temp;
        return result;
    }
}
```
