/*
快速排序
*/
#include<iostream>
using namespace std;
void QuickSort(int r[], int first, int end);
int mian()
{
	int r[5] = { 10,8,7,50,200 };
	cout << "Hello World!" << endl;
	QuickSort(r, 0, 4);
	for (int i = 0; i <= 4; i++)
		cout << r[i] << endl;
	return 0;

}
void QuickSort(int r[], int first, int end)
{
	if (first >= end) return;    //判断递归是否到头
	int i = first;
	int j = end;
	int temp = r[first];       //每次取第一个元素作为轴值进行划分
	while (i < j)
	{
		while ((i < j) && (r[j] >= temp))
			j--;
		r[i] = r[j];
		while ((i < j) && (r[i] <= temp))
			i++;
		r[j] = r[i];
	}
	r[i] = temp;
	QuickSort(r, first, i - 1);
	QuickSort(r, i + 1, end);
}
