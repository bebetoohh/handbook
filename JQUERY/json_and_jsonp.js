// JSON 和 JSONP 的相关知识，请查阅evernote上的笔记
// 这里仅介绍相关使用的代码


JSON 只有两种数据类型描述符，大括号{}和方括号[]，其余英文冒号:是映射符，英文逗号,是分隔符，英文双引号""是定义符。
大括号 {} 用来描述一组“不同类型的无序键值对集合”（对应OOP的属性描述） ； 方括号[] 用来描述一组“相同类型的有序数据集合”（对应OOP的数组）。

// JSON实例
//描述一个人
var person = {
	"Name" 	: "Bob",
	"Age"	: 32, 
	"Company": "IBM", 
	"Engineer": true, 
}

//获取这个人的信息
var personAge = person.Age;

// 描述几个人
var members = [
	{
		"Name": "Bob", 
		"Age": 32, 
		"Company": "IBM", 
		"Engineer": true, 
	},
	{
		"Name": "Bob", 
		"Age": 32, 
		"Company": "Oracle", 
		"Engineer": false, 
	},
	{
		"Name": "Henry", 
		"Age": 45,
		"Company": "Microsoft", 
		"Engineer": false, 
	}
]

