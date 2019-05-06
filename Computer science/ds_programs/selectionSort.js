function selectionSort(arr){
	for(var i=0;i<arr.length;i++){
		minKey=i;
		for(var j=i+1;j<arr.length-1;j++){
			if(arr[minKey]>arr[j]){
				minKey=j
			}
		}
		if(arr[j]==arr[i])
			continue;
		temp=arr[i];
		arr[i]=arr[minKey];
		arr[minKey]=temp;
	}
	return arr;
}
selectionSort([3,5,2,6,7,8]);
