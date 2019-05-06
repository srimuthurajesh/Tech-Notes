function bubbleSort(arr){
	for(var i=0;i<arr.length;i++){
		for(var j=0;j<arr.length-i;j++){
			if(arr[j]>arr[j+1]){
				temp=arr[j+1];
				arr[j+1]=arr[j];
				arr[j]=temp;
			}	
		}	
	}
	return arr;
}
bubbleSort([3,5,2,6,7,8]);
