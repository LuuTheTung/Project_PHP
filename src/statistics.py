import argparse
import time

import matplotlib.pyplot as plt
import seaborn as sns
import pandas as pd


if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='Process some integers.')
    parser.add_argument('--path_input', default='uploads/statistics.txt',
                        help='path to statistics file')
    parser.add_argument('--path_output', default='public/img/statistics.png',
                        help='path to statistics file')

    args = parser.parse_args()
    
    df = pd.read_csv(args.path_input, sep=' ')
    fig = df.plot(x='Field', y='Number', kind='barh').get_figure()
    plt.waitforbuttonpress()
    fig.savefig(args.path_output)