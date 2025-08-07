import { StyleSheet, Text, View } from "react-native";

const soma = (a: number, b:number) =>{
    return a + b;
}

type Props = {
    name : string;
    mark : string;
    model : string;
    inch : number;
    price : number;
    originalPrice? : number;
    details: string[];
}

export const TvItem = ({name, mark, model, inch, price, originalPrice,details}: Props) =>{

    return (
        <View style={style.container}>
            <Text style=    {[style.name, style.bold]}>{name}</Text>
            <Text style={style.attributes}>{`Marca: ${mark}`}</Text>
            <Text style={style.attributes}>{`Modelo: ${model}`}</Text>
            <Text style={style.attributes}>{`Polegada: ${inch}`}</Text>
            <Text style={style.price}>{`Preço: R$ ${price.toFixed(2)}`}</Text>
            <Text style={style.attributes}>{`Quantidade: ${soma(4,6)}`}</Text>
            {(originalPrice && originalPrice > price) && 
                <View>
                    <Text>Promoção Extra!</Text>
                </View> 
            }
            <Text>{details.join(', ')}</Text>
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