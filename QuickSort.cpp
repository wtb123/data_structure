/*
��������
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
	if (first >= end) return;    //�жϵݹ��Ƿ�ͷ
	int i = first;
	int j = end;
	int temp = r[first];       //ÿ��ȡ��һ��Ԫ����Ϊ��ֵ���л���
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
