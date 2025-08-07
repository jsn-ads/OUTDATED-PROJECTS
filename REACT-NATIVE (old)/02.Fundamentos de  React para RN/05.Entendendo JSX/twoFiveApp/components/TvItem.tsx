import { StyleSheet, Text, View } from "react-native";

const soma = (a: number, b:number) =>{
    return a + b;
}

export const TvItem = () =>
{

   
    let tv = 'QN90 ATX55BSDAD154';
    let brand = 'Samsung';
    let model = 'QN90 New QLed';
    let inch = 55;
    let price = 5000;

    return (
        <View style={style.container}>
            <Text style={[style.name, style.bold]}>{tv}</Text>
            <Text style={style.attributes}>{`Marca: ${brand}`}</Text>
            <Text style={style.attributes}>{`Modelo: ${model}`}</Text>
            <Text style={style.attributes}>{`Polegada: ${inch}`}</Text>
            <Text style={style.price}>{`Preço: R$ ${price.toFixed(2)}`}</Text>
            <Text style={style.attributes}>{`Unidade: ${soma(4,6)}`}</Text>
        </View>
    );
}

const style = StyleSheet.create({
    container:{
        margin: 10,
        padding: 10,
        backgroundColor: '#CCC'
    },
    name:{
        fontSize: 15
    },
    attributes:{
        fontSize: 13,
        color: '#0000FF',
    },
    price:{
        fontSize:13,
        color: '#006400'
    },
    bold:{
        fontWeight: 'bold'
    }

});