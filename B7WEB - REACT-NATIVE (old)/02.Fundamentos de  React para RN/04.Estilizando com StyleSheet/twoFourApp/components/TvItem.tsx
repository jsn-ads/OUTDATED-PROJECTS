import { StyleSheet, Text, View } from "react-native";

export const TvItem = () =>
{
    return (
        <View style={style.container}>
            <Text style={[style.name, style.bold]}>QN90 ATX55BSDAD154</Text>
            <Text style={style.attributes}>Marca: Samsung</Text>
            <Text style={style.attributes}>Modelo: QN90 New QLed</Text>
            <Text style={style.attributes}>Polegada: 55</Text>
            <Text style={style.price}>Preço: R$5000.00</Text>
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
